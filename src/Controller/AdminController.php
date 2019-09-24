<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieType;
use App\Entity\Entreprise;
use App\Entity\Specificites;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
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

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * @Route("/admin/entreprise", name="entreprise")
     */
    public function showEntreprise()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * Affiche les photos sous forme de tableau avec icone supprimer et formulaire d'ajout de photo
     * @Route("/admin/galeriephotos", name="galeriephotos")
     */
    public function galeriePhoto(Request $request)
    {

        $photo = new Galerie; //objet vide

        // On récupère le formulaire
        $form = $this->createForm(GalerieType::class, $photo);
        // On récupère les infos saisies dans le formulaire ($_POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($photo);
            // Enregistrer la $photo dans le système 

            // On enregistre la photo en BDD et sur le serveur. 
            if ($photo->getFile() != NULL) {
                $photo->uploadFile();
            }

            $manager->flush();
            // va enregistrer $photo en BDD

            $this->addFlash('success', 'La photo a bien été enregistrée !');

            return $this->redirectToRoute('galeriephotos');
        }

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/galeriephotos.html.twig', [
            'galerieForm' => $form->createView(),
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }


    /**
     * Supprime une photo dans la BDD
     * @Route("/admin/galeriephotos/delete/{id}", name="delete_photo")
     */
    public function deletePhoto($id)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * @Route("/admin/presensation-entreprise", name="presentationentreprise")
     */
    public function presentationEntreprise()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * @Route("/admin/barre-de-labels", name="barredelabels")
     */
    public function barreLabels()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/barre-de-labels.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * @Route("/admin/histoire-entreprise", name="histoireentreprise")
     */
    public function histoireEntreprise()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * @Route("/admin/competences", name="competences")
     */
    public function competences()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/competences.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * @Route("/admin/partenaires", name="partenaires")
     */
    public function partenaires()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/partenaires.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }

    /**
     * @Route("/admin/contact-localisation", name="contactlocalisation")
     */
    public function contactLocalisation()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/contact-localisation.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
        ]);
    }
}
