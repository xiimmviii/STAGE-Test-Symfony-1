<?php

namespace App\Controller;


use App\Entity\Tarifs;
use App\Entity\Contenu;
use App\Entity\Couleur;
use App\Entity\Galerie;
use App\Form\TarifsType;
use App\Form\ContenuType;
use App\Form\CouleurType;
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



class SuperAdminController extends AbstractController
{

 /**
     * Récupérer les informations (en BDD) qui apparaissent sur la vue de base (header+footer) >> BASE.html.twig 
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        // Ici, on récupère les informations en BDD en utilisant le Repository
        // Récupération : des éléments de la table Entreprise puis ceux la table Spécificités 
       
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        // Le findOneById permet de trier les données et de ne récupérer que la donnée qui a l'ID #1 

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);
        // Le findOneById permet de trier les données et de ne récupérer que la donnée qui a l'ID #1 

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

         // On retourne ensuite les éléments récupérés dans la vue qu'on injectera entre {{}} dans la vue twig ADMIN -> espaceadmin.html.twig
        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'couleurs' => $couleurs
        ]);
    }

        /* ---------------------------------------------------------------------------------------------------

        ╔═╗╔═╗╔═╗╔╦╗╦╔═╗╔╗╔  ╔═╗╔═╗╦ ╦╦  ╔═╗╦ ╦╦═╗
        ║ ╦║╣ ╚═╗ ║ ║║ ║║║║  ║  ║ ║║ ║║  ║╣ ║ ║╠╦╝
        ╚═╝╚═╝╚═╝ ╩ ╩╚═╝╝╚╝  ╚═╝╚═╝╚═╝╩═╝╚═╝╚═╝╩╚═

    --------------------------------------------------------------------------------------------------- */



 /**
     * Permet de gérer la couleur choisie pour le thème 
     * @Route("/admin/couleur", name="choix-couleur")
     */
    public function couleurTheme(Request $request)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //On utilise le repository pour accéder à la table Couleur
        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $colors = $repository->findAll();

        // -----------------------------------------------------------------------------------

        // On crée un objet vide 
        $color = new Couleur;

        // On créé la vue d'un formulaire qui provient du dossier FORM > CouleurType.php 
        $form = $this->createForm(CouleurType::class, $color);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        // On traite les donénes du formulaire >> CF lignes 81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($color);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('presentationentreprise');
        }
       
        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------


        // Dans ce cas-là, on modifie la variable date pour que la date actuelle soit générée
        // Cela nous permet d'avoir la date la plus recénte qui permet un affichage dans la VUE principale
        // C-A-D qu'on trie par DATE DESC et qu'on affiche 1 seule valur 
        $date = date("Y-m-d H-i-s");

        // La variable permet à l'utilsateur de voir "publier" de façon dynamique
        // Et non pas envoyer ou modifier comme les vues précédentes 
        $boutonenvoi = 'Publier';




        // -----------------------------------------------------------------------------------

        //on injecte les données dans la vue réalisations (en incluant les données pour le footer)
        return $this->render('admin/couleur.html.twig', [
            'entreprise' => $entreprise,
            'specificites' => $specificites, 
            'couleurs' => $couleurs,
            'colors' => $colors,
            'color' => $color,
            'CouleurForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }

    /**
     * Permet de gérer la couleur choisie pour le thème 
     * @Route("/admin/couleur-affichage/{id}", name="changer-couleur")
     */
    public function affichageCouleurTheme(Request $request, $id)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //On utilise le repository pour accéder à la table Couleur
        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $colors = $repository->findAll();

        // -----------------------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $color = $manager->find(Couleur::class, $id);

        // On créé la vue d'un formulaire qui provient du dossier FORM > EntrepriseType.php 
        $form = $this->createForm(CouleurType::class, $color);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($color);

            $manager->flush();

            $this->addFlash('success', 'La couleur a bien été modifiée');
            return $this->redirectToRoute('choix-couleur');
        }

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------


        // Dans ce cas-là, on modifie la variable date pour que la date actuelle soit générée
        // Cela nous permet d'avoir la date la plus recénte qui permet un affichage dans la VUE principale
        // C-A-D qu'on trie par DATE DESC et qu'on affiche 1 seule valur 
        $date = date("Y-m-d H-i-s");

        // La variable permet à l'utilsateur de voir "publier" de façon dynamique
        // Et non pas envoyer ou modifier comme les vues précédentes 
        $boutonenvoi = 'Publier';




        // -----------------------------------------------------------------------------------

        //on injecte les données dans la vue réalisations (en incluant les données pour le footer)
        return $this->render('admin/couleur.html.twig', [
            'entreprise' => $entreprise,
            'specificites' => $specificites, 
            'couleurs' => $couleurs,
            'color' => $color,
            'colors' => $colors,
            'CouleurForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }


}