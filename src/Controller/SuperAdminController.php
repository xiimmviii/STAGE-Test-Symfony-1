<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Icons;
use App\Entity\Design;
use App\Entity\Labels;
use App\Entity\Couleur;
use App\Entity\Reseaux;
use App\Form\DesignType;
use App\Form\LabelsType;
use App\Form\CouleurType;
use App\Entity\Entreprise;
use App\Entity\Competences;
use App\Entity\Localisation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SuperAdminController extends AbstractController
{

    /**
     * Récupérer les informations (en BDD) qui apparaissent sur la vue de base (header+footer) >> BASE.html.twig 
     * @Route("/super-admin", name="super-admin")
     */
    public function superAdmin()
    {
        // Ici, on récupère les informations en BDD en utilisant le Repository
        // Récupération : des éléments de la table Entreprise puis ceux la table Spécificités 

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        // Le findOneById permet de trier les données et de ne récupérer que la donnée qui a l'ID #1 

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);

        // Le findOneById permet de trier les données et de ne récupérer que la donnée qui a l'ID #1 

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // On retourne ensuite les éléments récupérés dans la vue qu'on injectera entre {{}} dans la vue twig ADMIN -> espaceadmin.html.twig
        return $this->render('admin/espaceadmin.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
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
     *
     * @Route("/super-admin/couleur", name="choix-couleur")
     */
    public function couleurTheme(Request $request)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


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
        return $this->render('super-admin/couleur.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
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
     * @Route("/super-admin/couleur-affichage/{id}", name="changer-couleur")
     */
    public function affichageCouleurTheme(Request $request, $id)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


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
        return $this->render('super-admin/couleur.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'couleurs' => $couleurs,
            'color' => $color,
            'colors' => $colors,
            'CouleurForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }





    /*--------------------------------------------



    ╔═╗╦ ╦╦╔╦╗╔═╗╦ ╦  ╦ ╦╔═╗╔═╗╦═╗
    ╚═╗║║║║ ║ ║  ╠═╣  ║ ║╚═╗║╣ ╠╦╝
    ╚═╝╚╩╝╩ ╩ ╚═╝╩ ╩  ╚═╝╚═╝╚═╝╩╚═




-------------------------------------*/



    /**
     *  
     * @Route("/super-admin/switch-user", name="switch-user")
     */
    public function switchUser()
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);
        // Le findOneById permet de trier les données et de ne récupérer que la donnée qui a l'ID #1 

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);

        // Le findOneById permet de trier les données et de ne récupérer que la donnée qui a l'ID #1 

        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findOneByRole(array('role' => 'ROLE_ADMIN'));



        // On retourne ensuite les éléments récupérés dans la vue qu'on injectera entre {{}} dans la vue twig ADMIN -> espaceadmin.html.twig
        return $this->render('super-admin/switch_user.html.twig', [
            'controller_name' => 'SuperAdminController',
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'users' => $users
        ]);
    }




    /*--------------------------------------------

╔═╗╦ ╦╔═╗╔╗╔╔═╗╔═╗╔╦╗╔═╗╔╗╔╔╦╗  ╔═╗╦  ╦╔═╗  ╔╦╗╦═╗╔═╗╔╗╔╔═╗╦╔╦╗╦╔═╗╔╗╔╔═╗
║  ╠═╣╠═╣║║║║ ╦║╣ ║║║║╣ ║║║ ║   ╚═╗╚╗╔╝║ ╦   ║ ╠╦╝╠═╣║║║╚═╗║ ║ ║║ ║║║║╚═╗
╚═╝╩ ╩╩ ╩╝╚╝╚═╝╚═╝╩ ╩╚═╝╝╚╝ ╩   ╚═╝ ╚╝ ╚═╝   ╩ ╩╚═╩ ╩╝╚╝╚═╝╩ ╩ ╩╚═╝╝╚╝╚═╝


-------------------------------------*/





    /**
     * Permet de gérer les svg de transition  
     *
     * @Route("/super-admin/svg-transi", name="svg-transi")
     */
    public function svgTransi(Request $request)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables concernées

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //On utilise le repository pour accéder à la table Couleur
        $repository = $this->getDoctrine()->getRepository(Design::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $svgtransis = $repository->findAll();

        // -----------------------------------------------------------------------------------

        // On crée un objet vide 
        $design = new Design;

        // On créé la vue d'un formulaire qui provient du dossier FORM > DesignType.php 
        $form = $this->createForm(DesignType::class, $design);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        // On traite les donénes du formulaire >> CF lignes 81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($design);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('svg-transi');
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
        return $this->render('super-admin/svg-transi.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'couleurs' => $couleurs,
            'svgtransis' => $svgtransis,
            'design' => $design,
            'DesignForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }



    /**
     * Permet de gérer le pack de svg de transition choisi pour le thème 
     * @Route("/super-admin/svg-transi-affichage/{id}", name="changer-svg-transi")
     */
    public function affichageSvgTransi(Request $request, $id)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //On utilise le repository pour accéder à la table Design
        $repository = $this->getDoctrine()->getRepository(Design::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $svgtransis = $repository->findAll();

        // -----------------------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $design = $manager->find(Design::class, $id);

        // On créé la vue d'un formulaire qui provient du dossier FORM > EntrepriseType.php 
        $form = $this->createForm(DesignType::class, $design);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($design);

            $manager->flush();

            $this->addFlash('success', 'Le pack de svg a bien été modifié');
            return $this->redirectToRoute('svg-transi');
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
        return $this->render('super-admin/svg-transi.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'couleurs' => $couleurs,
            'design' => $design,
            'svgtransis' => $svgtransis,
            'DesignForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }





    /*--------------------------------------------


╦  ╔═╗╔╗ ╔═╗╦  ╔═╗  
║  ╠═╣╠╩╗║╣ ║  ╚═╗  
╩═╝╩ ╩╚═╝╚═╝╩═╝╚═╝  


-------------------------------------*/



    /**
     * Permet de gérer les labels et icones associées
     *
     * @Route("/super-admin/labels", name="superadmin-labels")
     */
    public function labels(Request $request)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables concernées

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //On utilise le repository pour accéder à la table Couleur
        $repository = $this->getDoctrine()->getRepository(Icons::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $icons = $repository->findAll();

        // -----------------------------------------------------------------------------------

        // On crée un objet vide 
        $labels = new Labels;

        // On créé la vue d'un formulaire qui provient du dossier FORM > DesignType.php 
        $form = $this->createForm(LabelsType::class, $labels);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        // On traite les donénes du formulaire >> CF lignes 81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($labels);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('superadmin-labels');
        }

        // ----------------------------------------------------------------------

        //On utilise le repository pour accéder à la table Couleur
        $repository = $this->getDoctrine()->getRepository(Icons::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $iconsaffiches = $repository->findAll();



        // ----------------------------------------------------------------------



        //On veut limiter le nombre de localisations possibles à 10. 

        // On récupère le manager
        $em = $this->getDoctrine()->getManager();

        // On va dans l'entité Localisation
        $repo = $em->getRepository(Localisation::class);

        // On fait une requête pour compter combien de galeries il y a dans la table Galerie (galerie = g)
        $totalLocalisations = $repo->createQueryBuilder('l')
            //on séléctionne comment on compte les lignes (par l'id)
            ->select('count(l.id)')
            ->getQuery()
            ->getResult();

        // ----------------------------------------------------------------------

        //on injecte les données dans la vue réalisations (en incluant les données pour le footer)
        return $this->render('super-admin/labels.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'couleurs' => $couleurs,
            'icons' => $icons,
            'labels' => $labels,
            'LabelsForm' => $form->createView(),
            'iconsaffiches' => $iconsaffiches,
        ]);
    }


    /**
     * Supprime le label dans la BDD via le panneau super-administrateur
     * 
     *  @Route("/super-admin/label-delete/{id}", name="superadmin-label-delete")
     */
    public function deleteLabel($id)
    {
        // On récupère le MANAGER pour pouvoir gérer les informations en BDD >> Galerie
        $manager = $this->getDoctrine()->getManager();

        // On trouve l'élément concerné dans la table Galerie via son $ID et on lui applique une variable
        $label = $manager->find(Labels::class, $id);


        // On supprime ensuite la galerie de la BDD 
        $manager->remove($label);
        $manager->flush();

        // Message de succès et renvoi à la vue ADMIN >> Galerie Photos 
        $this->addFlash('success', 'Le label a bien été supprimé.');
        return $this->redirectToRoute('superadmin-labels');

        // ----------------------------------------------------------------------

        // On récupère et on renvoie les informations nécessaires pour l'affichage de la VUE
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        return $this->render('super-admin/labels.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'couleurs' => $couleurs,
            'label' => $label,
        ]);
    }
}
