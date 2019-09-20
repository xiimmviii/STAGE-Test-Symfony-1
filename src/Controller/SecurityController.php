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
        $error = $auth->getLastAuthenticationError();

        if (!empty($error)) {
            $this->addflash('errors', 'Problème d\'identifiant!');
        }

        return $this->render("security/login.html.twig", [
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
