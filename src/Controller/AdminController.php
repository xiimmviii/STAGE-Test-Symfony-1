<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/entreprise", name="entreprise")
     */
    public function showEntreprise()
    {
        return $this->render('admin/entreprise.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

        /**
     * @Route("/admin/galeriephotos", name="galeriephotos")
     */
    public function galeriePhoto()
    {
        return $this->render('admin/galeriephotos.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

        /**
     * @Route("/admin/presensation-entreprise", name="presentationentreprise")
     */
    public function presentationEntreprise()
    {
        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

        /**
     * @Route("/admin/barre-de-labels", name="barredelabels")
     */
    public function barreLabels()
    {
        return $this->render('admin/barre-de-labels.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

        /**
     * @Route("/admin/histoire-entreprise", name="histoireentreprise")
     */
    public function histoireEntreprise()
    {
        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

        /**
     * @Route("/admin/competences", name="competences")
     */
    public function competences()
    {
        return $this->render('admin/competences.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

        /**
     * @Route("/admin/partenaires", name="partenaires")
     */
    public function partenaires()
    {
        return $this->render('admin/partenaires.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

        /**
     * @Route("/admin/contact-localisation", name="contactlocalisation")
     */
    public function contactLocalisation()
    {
        return $this->render('admin/contact-localisation.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }


}
