<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Specificites;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        // if ($this->getUser()) {
        //    $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', 
        ['last_username' => $lastUsername, 
        'error' => $error, 
        'entreprise' => $entreprise,
        'specificites' => $specificites  
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    { 
        return; 
    }
}
