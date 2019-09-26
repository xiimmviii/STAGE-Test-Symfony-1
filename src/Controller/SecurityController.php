<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Specificites;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

//Pour créer la fonctionnalité de connexion/déconnexion, nous avons utilisé la doc symfony : https://symfony.com/doc/current/security/form_login_setup.html

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

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
        'entreprise' => $entreprise,
        'specificites' => $specificites  
        ]);

        //le reste du login est configuré dans config/packages/security.yaml et dans src/Security/LoginFormAuthenticator.php
        //symfony prend en charge la majeure partie du travail pour la connexion; il y a peu de code à écrire de notre côté
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    { 
         //cette fonction peut être vide, une fois encore Symfony gère tout en arrière-plan.
         // le reste du logout est configuré dans config/packages/security.yaml
    }
}
