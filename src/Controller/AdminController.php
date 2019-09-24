<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        

        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

    /**
     * @Route("/admin/entreprise", name="entreprise")
     */
    public function showEntreprise()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

        /**
     * @Route("/admin/galeriephotos", name="galeriephotos")
     */
    public function galeriePhoto()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/galeriephotos.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

        /**
     * @Route("/admin/presensation-entreprise", name="presentationentreprise")
     */
    public function presentationEntreprise()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

        /**
     * @Route("/admin/barre-de-labels", name="barredelabels")
     */
    public function barreLabels()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/barre-de-labels.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

        /**
     * @Route("/admin/histoire-entreprise", name="histoireentreprise")
     */
    public function histoireEntreprise()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

        /**
     * @Route("/admin/competences", name="competences")
     */
    public function competences()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/competences.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

        /**
     * @Route("/admin/partenaires", name="partenaires")
     */
    public function partenaires()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/partenaires.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }

        /**
     * @Route("/admin/contact-localisation", name="contactlocalisation")
     */
    public function contactLocalisation()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        return $this->render('admin/contact-localisation.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise
        ]);
    }


}
