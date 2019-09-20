<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     *
     */
    public function login(AuthenticationUtils $auth)
    {

        $lastUsername = $auth->getLastUsername();
        // récupérer le pseudo qui a été utilisé la dernière fois

        $error = $auth->getLastAuthenticationError();
        // récupérer les erreurs

        if (!empty($error)) {
            $this->addFlash('errors', 'Problème d\'identifiant !');
        }


        return $this->render('security/login.html.twig', [
            'lastUsername' => $lastUsername
        ]);
    }

    /**
     * @Route("/deconnexion", name="deconnexion")
     *
     */
    public function deconnexion()
    { }

    /**
     * @Route("/connexion_check", name="connexion_check")
     *
     */
    public function connexionCheck()
    { }
}
