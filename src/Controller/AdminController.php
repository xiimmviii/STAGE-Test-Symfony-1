<?php

namespace App\Controller;

use App\Entity\Contenu;
use App\Entity\Galerie;
use App\Form\ContenuType;
use App\Form\GalerieType;
use App\Entity\Entreprise;
use App\Entity\Partenaires;
use App\Entity\Specificites;
use App\Form\EntrepriseType;
use App\Form\PartenairesType;
use App\Form\SpecificitesType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
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
    public function showEntreprise(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        // -----------------------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();

        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($entreprise);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('admin');
        }


        return $this->render('admin/entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'EntrepriseForm' => $form->createView()
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

        //on récupère toutes les photos déjà dans la BDD
        $repo = $this->getDoctrine()->getRepository(Galerie::class);
        $photos = $repo->findAll();

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/galeriephotos.html.twig', [
            'galerieForm' => $form->createView(),
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'photos' => $photos,
        ]);
    }


    /**
     * Supprime une photo dans la BDD
     * @Route("/admin/galeriephotos/delete/{id}", name="delete_photo")
     */
    public function deletePhoto($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $photo = $manager->find(Galerie::class, $id);

        $photo->removePhoto();
        $manager->remove($photo);
        $manager->flush();

        $this->addFlash('success', 'La photo a bien été supprimée.');
        return $this->redirectToRoute('galeriephotos');

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
    public function presentationEntreprise(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        // -----------------------------------------------------------------------------------

        $repo = $this->getDoctrine()->getRepository(Contenu::class);
        $presentations = $repo->findBySection('presentation');

        // -----------------------------------------------------------------------------------

        $presentation = new Contenu;

        $form = $this->createForm(ContenuType::class, $presentation);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($presentation);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('presentationentreprise');

            
        }
        
        $date = '';

        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'presentations' => $presentations,
            'ContenuForm' => $form->createView(),
            'date'=> $date,
        ]);
    }

    /**
     * @Route("/admin/presentation-entreprise/delete/{id}", name="delete_presentation")
     */
    public function deletePresentation($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $presentation = $manager->find(Contenu::class, $id);

        $manager->remove($presentation);
        $manager->flush();

        $this->addFlash('success', 'Le texte de présentation a bien été supprimé.');
        return $this->redirectToRoute('presentationentreprise');

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $date = '';

        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'date' => $date,
        ]);
    }


    /**
     * @Route("/admin/presentation-entreprise/update/{id}", name="update_presentation")
     */
    public function updatePresentation($id, ObjectManager $manager, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repo = $this->getDoctrine()->getRepository(Contenu::class);
        $presentations = $repo->findBySection('presentation');

        // -----------------------------------------------------------------------------------

        $manager = $this -> getDoctrine() -> getManager();
        $presentation = $manager -> find(Contenu::class, $id);

        $form = $this -> createForm(ContenuType::class, $presentation);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()){

            $manager -> persist($presentation);

            $manager -> flush();

            $this -> addFlash('success', 'La présentation a bien été modifiée');
            return $this -> redirectToRoute('presentationentreprise');
        }

        // -----------------------------------------------------------------------------------

        $date = ''; 

        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'ContenuForm' => $form -> createView(),
            'presentations' => $presentations,
            'date' => $date,
        ]);
    }

    /**
     * @Route("/admin/presentation-entreprise/affichage/{id}", name="affichage_presentation")
     */
    public function affichagePresentation($id, ObjectManager $manager, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repo = $this->getDoctrine()->getRepository(Contenu::class);
        $presentations = $repo->findBySection('presentation');

        // -----------------------------------------------------------------------------------

        $manager = $this -> getDoctrine() -> getManager();
        $presentation = $manager -> find(Contenu::class, $id);

        $form = $this -> createForm(ContenuType::class, $presentation);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()){

            $manager -> persist($presentation);

            $manager -> flush();

            $this -> addFlash('success', 'La présentation a bien été modifiée');
            return $this -> redirectToRoute('presentationentreprise');
        }



        $date = date("Y-m-d H-i-s");

        // -----------------------------------------------------------------------------------

        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'ContenuForm' => $form -> createView(),
            'presentations' => $presentations,
            'date' => $date,
        ]);
    }

    /**
     * @Route("/admin/histoire-entreprise", name="histoireentreprise")
     */
    public function histoireEntreprise(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        // -------------------------------------------------------------------

        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findBySection('historique');

        // --------------------------------------------------------------------

        $historique = new Contenu;

        $form = $this->createForm(ContenuType::class, $historique);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($historique);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('histoireentreprise');
        }

        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'historiques' => $historiques,
            'ContenuForm' => $form->createView()
        ]);
    }

/**
     * @Route("/admin/histoire-entreprise/affichage/{id}", name="affichage_histoireEntreprise")
     */
    public function setStatutHistorique (Request $request)
    {
         // -------------------------------------------------------------------


         $repository = $this->getDoctrine()->getRepository(Entreprise::class);
         $entreprise = $repository->findOneById(1);
 
         $repository = $this->getDoctrine()->getRepository(Specificites::class);
         $specificites = $repository->findOneById(1);
 
         $repository = $this->getDoctrine()->getRepository(Contenu::class);
         $historiques = $repository->findBySection('historique');
    
            // --------------------------------------------------------------------
 
 
         $manager = $this->getDoctrine()->getManager();
         $historique = $manager->find(Contenu::class, $id);
 
 
         $form = $this->createForm(ContenuType::class, $historique);
         $form->handleRequest($request);
 
         if ($form->isSubmitted() && $form->isValid()) {
 
             $manager->persist($historique);
 
             $manager->flush();
 
             $this->addFlash('success', 'Les modifications ont été effectuées ! ');
             return $this->redirectToRoute('histoireentreprise');
         }
 
         return $this->render('admin/histoire-entreprise.html.twig', [
             'controller_name' => 'AdminController',
             'entreprise' => $entreprise,
             'specificites' => $specificites,
             'historiques' => $historiques,
             'ContenuForm' => $form->createView()
         ]);
    }


    /**
     * @Route("/admin/histoire-entreprise/update/{id}", name="update_histoireEntreprise")
     */
    public function updateHistoireEntreprise($id, Request $request)
    {

           // -------------------------------------------------------------------


        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findBySection('historique');
   
           // --------------------------------------------------------------------


        $manager = $this->getDoctrine()->getManager();
        $historique = $manager->find(Contenu::class, $id);


        $form = $this->createForm(ContenuType::class, $historique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($historique);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('histoireentreprise');
        }

        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'historiques' => $historiques,
            'ContenuForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/histoire-entreprise/delete/{id}", name="delete_historiqueEntreprise")
     */
    public function deleteHistoireEntreprise($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $historique = $manager->find(Contenu::class, $id);

        $manager->remove($historique);
        $manager->flush();

        $this->addFlash('success', 'Le texte de présentation a bien été supprimé.');
        return $this->redirectToRoute('histoireentreprise');

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
     * @Route("/admin/specificites", name="specificites")
     */
    public function competences(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        // -----------------------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();

        $form = $this->createForm(SpecificitesType::class, $specificites);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($specificites);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('admin');
        }


        return $this->render('admin/specificites.html.twig', [
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'specificitesForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/partenaires", name="partenaires")
     */
    public function partenaires(Request $request)
    {

        $logo = new Partenaires; //objet vide

        $form = $this->createForm(PartenairesType::class, $logo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($logo);

            if ($logo->getFile() != NULL) {
                $logo->uploadFile();
            }

            $manager->flush();

            $this->addFlash('success', 'Le partenaire a bien été ajouté !');
        }

        //-------------------------------------------------------------------------------

        $repository = $this->getDoctrine()->getRepository(Partenaires::class);
        $logos = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/partenaires.html.twig', [
            'PartenairesForm' => $form->createView(),
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'logos' => $logos
        ]);
    }

    /**
     * Supprime un partenaire
     * @Route("/admin/partenaires/delete/{id}", name="delete_partenaire")
     */
    public function deletePartenaire($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $partenaire = $manager->find(Partenaires::class, $id);

        $partenaire->removeLogo();
        $manager->remove($partenaire);
        $manager->flush();

        $this->addFlash('success', 'Le partenaire a bien été supprimé');
        return $this->redirectToRoute('partenaires');

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
}
