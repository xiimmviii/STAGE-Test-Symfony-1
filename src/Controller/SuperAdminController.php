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

        // On retourne ensuite les éléments récupérés dans la vue qu'on injectera entre {{}} dans la vue twig ADMIN -> espaceadmin.html.twig
        return $this->render('admin/espaceadmin.html.twig', [
        ]);
    }

/* ---------------------------------------------------------------------------------------------------

        ╔═╗╔═╗╔═╗╔╦╗╦╔═╗╔╗╔  ╔═╗╔═╗╦ ╦╦  ╔═╗╦ ╦╦═╗
        ║ ╦║╣ ╚═╗ ║ ║║ ║║║║  ║  ║ ║║ ║║  ║╣ ║ ║╠╦╝
        ╚═╝╚═╝╚═╝ ╩ ╩╚═╝╝╚╝  ╚═╝╚═╝╚═╝╩═╝╚═╝╚═╝╩╚═
           
--------------------------------------------------------------------------------------------------- */


    /**
     * Permet de gérer la couleur choisie pour le thème 
     * @Route("/super-admin/couleur", name="choix-couleur")
     */
    public function couleurTheme(Request $request)
    {

        // On utilise le repository pour accéder à la table Couleur
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

            $this->addFlash('success', 'La couleur a bien été modifiée ! ');
            return $this->redirectToRoute('presentationentreprise');
        }

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


        // Dans ce cas-là, on modifie la variable date pour que la date actuelle soit générée
        // Cela nous permet d'avoir la date la plus recénte qui permet un affichage dans la VUE principale
        // C-A-D qu'on trie par DATE DESC et qu'on affiche 1 seule valur 
        $date = date("Y-m-d H-i-s");

        // La variable permet à l'utilsateur de voir "publier" de façon dynamique
        // Et non pas envoyer ou modifier comme les vues précédentes 
        $boutonenvoi = 'Publier';
        
// ------------------------------------------------------------------------

        //on injecte les données dans la vue réalisations (en incluant les données pour le footer)
        return $this->render('super-admin/couleur.html.twig', [
            'color' => $color,
            'colors' => $colors,
            'CouleurForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }



/*-----------------------------------------------------------------------------

    ╔═╗╦ ╦╦╔╦╗╔═╗╦ ╦  ╦ ╦╔═╗╔═╗╦═╗
    ╚═╗║║║║ ║ ║  ╠═╣  ║ ║╚═╗║╣ ╠╦╝
    ╚═╝╚╩╝╩ ╩ ╚═╝╩ ╩  ╚═╝╚═╝╚═╝╩╚═

---------------------------------------------------------------------------*/



    /**
     *  
     * @Route("/super-admin/switch-user", name="switch-user")
     */
    public function switchUser()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findOneByRole(array('role' => 'ROLE_ADMIN'));

        // On retourne ensuite les éléments récupérés dans la vue qu'on injectera entre {{}} dans la vue twig ADMIN -> espaceadmin.html.twig
        return $this->render('super-admin/switch_user.html.twig', [
            'users' => $users
        ]);
    }




/*--------------------------------------------------------------------------

    ╔═╗╦ ╦╔═╗╔╗╔╔═╗╔═╗╔╦╗╔═╗╔╗╔╔╦╗  ╔═╗╦  ╦╔═╗  ╔╦╗╦═╗╔═╗╔╗╔╔═╗╦╔╦╗╦╔═╗╔╗╔╔═╗
    ║  ╠═╣╠═╣║║║║ ╦║╣ ║║║║╣ ║║║ ║   ╚═╗╚╗╔╝║ ╦   ║ ╠╦╝╠═╣║║║╚═╗║ ║ ║║ ║║║║╚═╗
    ╚═╝╩ ╩╩ ╩╝╚╝╚═╝╚═╝╩ ╩╚═╝╝╚╝ ╩   ╚═╝ ╚╝ ╚═╝   ╩ ╩╚═╩ ╩╝╚╝╚═╝╩ ╩ ╩╚═╝╝╚╝╚═╝

---------------------------------------------------------------------------*/


    /**
     * Permet de gérer les svg de transition  
     * @Route("/super-admin/svg-transi", name="svg-transi")
     */
    public function svgTransi(Request $request)
    {
       
        // On utilise le repository pour accéder à la table Design
        $repository = $this->getDoctrine()->getRepository(Design::class);
        // On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
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

            $this->addFlash('success', 'Le pack de SVG a bien été modifié');
            return $this->redirectToRoute('svg-transi');
        }

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

        //On utilise le repository pour accéder à la table Design
        $repository = $this->getDoctrine()->getRepository(Design::class);
        //On récupère toutes les données de la table Design et on les injecte dans l'objet $svgtransis
        $svgtransis = $repository->findAll();

// -----------------------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $design = $manager->find(Design::class, $id);

        // On créé la vue d'un formulaire qui provient du dossier FORM > DesignType.php 
        $form = $this->createForm(DesignType::class, $design);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($design);

            $manager->flush();

            $this->addFlash('success', 'Le pack de SVG a bien été modifié');
            return $this->redirectToRoute('svg-transi');
        }

// ----------------------------------------------------------------------

        // Dans ce cas-là, on modifie la variable date pour que la date actuelle soit générée
        // Cela nous permet d'avoir la date la plus récente qui permet un affichage dans la VUE principale
        // C-A-D qu'on trie par DATE DESC et qu'on affiche 1 seule valur 
        $date = date("Y-m-d H-i-s");

        // La variable permet à l'utilsateur de voir "publier" de façon dynamique
        // Et non pas envoyer ou modifier comme les vues précédentes 
        $boutonenvoi = 'Publier';

// -----------------------------------------------------------------------------------

     
        return $this->render('super-admin/svg-transi.html.twig', [
            'design' => $design,
            'svgtransis' => $svgtransis,
            'DesignForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }


/*----------------------------------------------------------------------------------


    ╦  ╔═╗╔╗ ╔═╗╦  ╔═╗  
    ║  ╠═╣╠╩╗║╣ ║  ╚═╗  
    ╩═╝╩ ╩╚═╝╚═╝╩═╝╚═╝  


---------------------------------------------------------------------------------*/



    /**
     * Permet de gérer les labels et icones associées
     *
     * @Route("/super-admin/labels", name="superadmin-labels")
     */
    public function labels(Request $request)
    {

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

            $this->addFlash('success', ' Le label a bien été ajouté ! ');
            return $this->redirectToRoute('superadmin-labels');
        }

// ----------------------------------------------------------------------

        //On utilise le repository pour accéder à la table Couleur
        $repository = $this->getDoctrine()->getRepository(Icons::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $iconsaffiches = $repository->findAll();


// ----------------------------------------------------------------------

        //On veut limiter le nombre de labels possibles à 5. 

        // On récupère le manager
        $em = $this->getDoctrine()->getManager();

        // On va dans l'entité Localisation
        $repo = $em->getRepository(Labels::class);

        // On fait une requête pour compter combien de labels il y a dans la table labels (labels = l)
        $totalLabels = $repo->createQueryBuilder('l')
            //on séléctionne comment on compte les lignes (par l'id)
            ->select('count(l.id)')
            ->getQuery()
            ->getResult();

// ----------------------------------------------------------------------

        //on injecte les données dans la vue réalisations (en incluant les données pour le footer)
        return $this->render('super-admin/labels.html.twig', [
            'icons' => $icons,
            'labels' => $labels,
            'LabelsForm' => $form->createView(),
            'iconsaffiches' => $iconsaffiches,
            'totalLabels' => $totalLabels,
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

        return $this->render('super-admin/labels.html.twig', [
            'label' => $label,
        ]);
    }
}
