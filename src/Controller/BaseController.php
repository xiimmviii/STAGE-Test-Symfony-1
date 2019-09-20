<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    /**
     * @Route("/realisations", name="realisations")
     */
    public function realisations()
    {
        return $this->render('base/realisations.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('base/contact.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }


}
