<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

//Pour créer la fonctionnalité de connexion/déconnexion, nous avons utilisé la doc symfony : https://symfony.com/doc/current/security/form_login_setup.html

class SecurityController extends AbstractController
{
    /**
     * route du login, affiche le formulaire de login (c'est l'adresse à envoyer au client pour qu'il puisse changer le contenu de son site)
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

// -----------------------------------------------------------------------------------

        //on a au préalable créé une table USER (cf src/entity/user.php)

        // on recupère les erreurs s'il y en a (fonction native à Symfony)
        $error = $authenticationUtils->getLastAuthenticationError();

        // on récupère le dernier nom d'utilisateur/email utilisé s'il y en a un (fonction native à Symfony)
        $lastUsername = $authenticationUtils->getLastUsername();


        //on injecte les données dans la vue (en incluant les données pour le footer)
        return $this->render('security/login.html.twig', 
        ['last_username' => $lastUsername, 
        'error' => $error, 
        ]);

        //le reste du login est configuré dans config/packages/security.yaml et dans src/Security/LoginFormAuthenticator.php
        //symfony prend en charge la majeure partie du travail pour la connexion; il y a peu de code à écrire de notre côté
    }

    /**
     * route de déconnexion
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    { 
         //cette fonction peut être vide, une fois encore Symfony gère tout en arrière-plan.
         // le reste du logout est configuré dans config/packages/security.yaml
    }

        /**
     * @Route("/forgotten_password", name="app_forgotten_password")
     */
    public function forgottenPassword(
        Request $request,
        UserPasswordEncoderInterface $encoder,
        \Swift_Mailer $mailer,
        TokenGeneratorInterface $tokenGenerator
    ): Response
    {

        if ($request->isMethod('POST')) {

            $email = $request->request->get('email');

            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::class)->findOneByEmail($email);
            /* @var $user User */

            if ($user === null) {
                $this->addFlash('danger', 'Email Inconnu');
                return $this->redirectToRoute('homepage');
            }
            $token = $tokenGenerator->generateToken();

            try{
                $user->setResetToken($token);
                $entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash('warning', $e->getMessage());
                return $this->redirectToRoute('homepage');
            }

            $url = $this->generateUrl('app_reset_password', array('token' => $token), UrlGeneratorInterface::ABSOLUTE_URL);

            $message = (new \Swift_Message('Mot de passe oublié - ADMIN '))
                ->setFrom('test.mbmp@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    "Vous recevez cet email car nous avez demandé un changement de mot de passe. <br> Il vous suffit de cliquer sur le lien ci-dessous pour définir un nouveau mot de passe. <br>  " . $url . " <br><br><b>Si ce n'est pas le cas, contacter votre agence.</b>",
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('notice', 'Mail envoyé');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/forgotten_password.html.twig');
    }

    /**
     * @Route("/reset_password/{token}", name="app_reset_password")
     */
    public function resetPassword(Request $request, string $token, UserPasswordEncoderInterface $passwordEncoder)
    {

        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();

            $user = $entityManager->getRepository(User::class)->findOneByResetToken($token);
            /* @var $user User */

            if ($user === null) {
                $this->addFlash('danger', 'Token Inconnu');
                return $this->redirectToRoute('app_login');
            }

            $user->setResetToken(null);
            $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('password')));
            $entityManager->flush();

            $this->addFlash('notice', 'Mot de passe mis à jour');

            return $this->redirectToRoute('admin');
        }else {

            return $this->render('security/reset_password.html.twig', ['token' => $token]);
        }

    }
}
