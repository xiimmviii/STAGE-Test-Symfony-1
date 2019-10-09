<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\Tarifs;
use App\Entity\Contenu;
use App\Entity\Couleur;
use App\Entity\Galerie;
use App\Entity\Picture;
use App\Entity\Horaires;
use App\Form\TarifsType;
use App\Form\ContenuType;
use App\Form\GalerieType;
use App\Form\PictureType;
use App\Entity\Entreprise;
use App\Form\HorairesType;
use App\Entity\Partenaires;
use App\Entity\Specificites;
use App\Form\EntrepriseType;
use App\Form\PartenairesType;
use App\Form\SpecificitesType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Proxies\__CG__\App\Entity\Galerie as ProxiesGalerie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class AdminController extends AbstractController
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
    ╦╔╗╔╔═╗╔═╗  ╔═╗╔╗╔╔╦╗╦═╗╔═╗╔═╗╦═╗╦╔═╗╔═╗
    ║║║║╠╣ ║ ║  ║╣ ║║║ ║ ╠╦╝║╣ ╠═╝╠╦╝║╚═╗║╣ 
    ╩╝╚╝╚  ╚═╝  ╚═╝╝╚╝ ╩ ╩╚═╚═╝╩  ╩╚═╩╚═╝╚═╝
    --------------------------------------------------------------------------------------------------- */

    /**
     * Récupérer les informations de l'entreprise et les afficher dans la partie de modification des informations de l'entreprise
     * L'affichage permet la modification ce qui permet d'avoir toujours en visuel les informations 
     * @Route("/admin/entreprise", name="entreprise")
     */
    public function showEntreprise(Request $request)
    {
        // On récupère les informations en BDD en utilisant le Repository
        // Récupération : des éléments de la table Entreprise puis ceux la table Spécificités  

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // On utilise le manager pour pouvoir traiter les informations en BDD >> Entreprise 
        $manager = $this->getDoctrine()->getManager();

        // On créé la vue d'un formulaire qui provient du dossier FORM > EntrepriseType.php 
        $form = $this->createForm(EntrepriseType::class, $entreprise);
        // handleRequest permet de récupérer les infos du formulaire lorsque celui-ci sera "envoyé" >> [$_POST]
        $form->handleRequest($request);

        // On pose la condition : 
        //      -> si le formulaire est soumis et que les éléments envoyés correspondent aux attentes définies dans le formulaire type
        //      -> on "persist" , c-a-d qu'on indique à Doctrine que l'objet doit être enregistré 
        //      -> on "flush", c-a-d qu'on valide l'envoi dans la BDD 
        //      -> on affiche ensuite un message flash de succès sur la page, puis on redirige vers la route 'ADMIN' 

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($entreprise);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('admin');
        }

        // On renvoie les informations dans la vue ENTREPRISE.HTML.TWIG 
        // Les informations récupérées des tables Entreprise, Spécificités 
        // On renvoie aussi la vue du formulaire EntrepriseType.php

        return $this->render('admin/entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'EntrepriseForm' => $form->createView(),
            'couleurs' => $couleurs
        ]);
    }


    /* ---------------------------------------------------------------------------------------------------
    ╔═╗╔═╗╦  ╔═╗╦═╗╦╔═╗  ╔═╗╦ ╦╔═╗╔╦╗╔═╗╔═╗
    ║ ╦╠═╣║  ║╣ ╠╦╝║║╣   ╠═╝╠═╣║ ║ ║ ║ ║╚═╗
    ╚═╝╩ ╩╩═╝╚═╝╩╚═╩╚═╝  ╩  ╩ ╩╚═╝ ╩ ╚═╝╚═╝
    --------------------------------------------------------------------------------------------------- */


    /**
     * Permet d'ajouter une galerie grâce à un formulaire et affiche les galeries existantes et les boutons permettant de les modifier
     * @Route("/admin/gestiongaleries", name="gestiongaleries")
     */
    public function gestionGaleries(Request $request)
    {
        // On crée un objet vide qu'on pourra ensuite réutiliser
        $galerie = new Galerie;

        // On créé la vue d'un formulaire qui provient du dossier FORM > GalerieType.php 
        $form = $this->createForm(GalerieType::class, $galerie);
        // On récupère les infos saisies dans le formulaire ($_POST)
        $form->handleRequest($request);

        // CF TRAITEMENT DU FORMULAIRE >> ligne 81-86 

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();

            // On enregistre la galerie  et la photo associée dans le système 
            $manager->persist($galerie);

            // On enregistre la galerie en BDD 
            $manager->flush();

            // On affiche le message si l'action est réussie 
            $this->addFlash('success', 'La galerie a bien été créée !');

            // On retourne à la vue >> Admin > GaleriePhoto 
            return $this->redirectToRoute('gestiongaleries');
        }

        // ----------------------------------------------------------------------

        //On veut limiter le nombre de galeries possible à 10. 

        // On récupère le manager
        $em = $this->getDoctrine()->getManager();

        // On va dans l'entité Galerie
        $repo = $em->getRepository(Galerie::class);

        // On fait une requête pour compter combien de galeries il y a dans la table Galerie (galerie = g)
        $totalGaleries = $repo->createQueryBuilder('g')
            //on séléctionne comment on compte les lignes (par l'id)
            ->select('count(g.id)')
            ->getQuery()
            ->getResult();

        // ----------------------------------------------------------------------

        // On récupère toutes les galeries déjà dans la BDD
        $repository = $this->getDoctrine()->getRepository(Galerie::class);
        // Le findAll permet de récupérer toutes les informations stockées en BDB 
        $galeries = $repository->findAll();

        // ----------------------------------------------------------------------

        // On récupère les informations et on les renvoie dans la VUE 
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        return $this->render('admin/gestiongaleries.html.twig', [
            'galerieForm' => $form->createView(),
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'galeries' => $galeries,
            'couleurs' => $couleurs,
            'totalGaleries' => $totalGaleries,
        ]);
    }



    /**
     * Supprime une photo dans la galerie via le panneau d'Admin 
     * @Route("/admin/galeriephotos/delete_photo/{id}", name="delete_photo")
     */
    public function deletePhoto($id)
    {
        // On récupère le MANAGER pour pouvoir gérer les informations en BDD >> Galerie
        $manager = $this->getDoctrine()->getManager();

        // On trouve l'élément concerné dans la table Galerie via son $ID et on lui applique une variable
        $photo = $manager->find(Picture::class, $id);

        // Le MANAGER enregistre l'info et transmet ensuite à la BDD 
        $manager->remove($photo);
        $manager->flush();

        // Message de succès et renvoi à la vue ADMIN >> Galerie Photos 
        $this->addFlash('success', 'La photo a bien été supprimée.');
        return $this->redirectToRoute('gestiongaleries');

        // ----------------------------------------------------------------------
        // On récupère et on renvoie les informations nécessaires pour l'affichage de la VUE B
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        return $this->render('admin/gestiongalerie.html.twig', [
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'couleurs' => $couleurs
        ]);
    }



    /**
     * Supprime une galerie dans la BDD via le panneau administrateur.
     *  /!\ Pour supprimer une galerie il faut d'abord supprimer toutes les photos qu'elle contient à cause du lien entre les tables. C'est fait automatiquement par l'ajout d'un "orphan removal" dans l'entité. 
     * @Route("/admin/galeriephotos/delete_galerie/{id}", name="delete_galerie")
     */
    public function deleteGalerie($id)
    {
        // On récupère le MANAGER pour pouvoir gérer les informations en BDD >> Galerie
        $manager = $this->getDoctrine()->getManager();

        // On trouve l'élément concerné dans la table Galerie via son $ID et on lui applique une variable
        $galerie = $manager->find(Galerie::class, $id);


        // On supprime ensuite la galerie de la BDD 
        $manager->remove($galerie);
        $manager->flush();

        // Message de succès et renvoi à la vue ADMIN >> Galerie Photos 
        $this->addFlash('success', 'La galerie a bien été supprimée.');
        return $this->redirectToRoute('gestiongaleries');

        // ----------------------------------------------------------------------

        // On récupère et on renvoie les informations nécessaires pour l'affichage de la VUE
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        return $this->render('admin/gestiongaleries.html.twig', [
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'couleurs' => $couleurs
        ]);
    }


    /**
     * ajoute/supprime une photo dans une galerie précise et permet de modifier le texte/nom de la galerie
     * @Route("/admin/modifiergalerie/{id}", name="modifiergalerie")
     */
    public function modifierGalerie(Request $request, $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $galerie1 = $manager->find(Galerie::class, $id);

        // On créé la vue d'un formulaire qui provient du dossier FORM > GalerieType.php 
        $form = $this->createForm(GalerieType::class, $galerie1);

        // On gère les informations du formulaire 
        $form->handleRequest($request);

        // Conditions du formulaire >> CF l.81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($galerie1);

            $manager->flush();

            // Message qui confirme l'action et retour à la route 
            $this->addFlash('success', 'La galerie a bien été modifiée');
            return $this->redirectToRoute('modifiergalerie');
        }


        // On récupère toutes les photos déjà dans la BDD
        $repository = $this->getDoctrine()->getRepository(Picture::class);
        // Le findAll permet de récupérer toutes les informations stockées en BDB 
        $pictures = $repository->findByGalerie($id);


        //-------------------------------------------------------------

        //On veut limiter le nombre de photos dans une galerie à 4. 

        // On récupère le manager
        $em = $this->getDoctrine()->getManager();

        // On va dans l'entité Picture
        $repo = $em->getRepository(Picture::class);

        // // On va dans l'entité Galerie
        // $repo = $em->getRepository(Galerie::class);

        $galerie = $id;


        // On fait une requête pour compter combien de galeries il y a dans la table Galerie (galerie = g)
        // $totalPictures = $repo->createQueryBuilder('p', 'g')
        $totalPictures = $repo->createQueryBuilder('p')
            //on séléctionne comment on compte les lignes (par l'id)
            ->select('count(p.id)')
            ->where('p.galerie = :nb')
            ->setParameter('nb', $galerie)
            ->getQuery()
            ->getResult();



        //-------------------------------------------------------------

        // On récupère les informations et on les renvoie dans la VUE 
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        return $this->render('admin/modifiergalerie.html.twig', [
            'galerieForm' => $form->createView(),
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'pictures' => $pictures,
            'couleurs' => $couleurs,
            'totalPictures' => $totalPictures,
        ]);
    }


    /* ---------------------------------------------------------------------------------------------------
    ╔═╗╦═╗╔═╗╔═╗╔═╗╔╗╔╔╦╗╔═╗╔╦╗╦╔═╗╔╗╔  ╔═╗╔╗╔╔╦╗╦═╗╔═╗╔═╗╦═╗╦╔═╗╔═╗
    ╠═╝╠╦╝║╣ ╚═╗║╣ ║║║ ║ ╠═╣ ║ ║║ ║║║║  ║╣ ║║║ ║ ╠╦╝║╣ ╠═╝╠╦╝║╚═╗║╣ 
    ╩  ╩╚═╚═╝╚═╝╚═╝╝╚╝ ╩ ╩ ╩ ╩ ╩╚═╝╝╚╝  ╚═╝╝╚╝ ╩ ╩╚═╚═╝╩  ╩╚═╩╚═╝╚═╝
    --------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/presensation-entreprise", name="presentationentreprise")
     */
    public function presentationEntreprise(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        $repo = $this->getDoctrine()->getRepository(Contenu::class);
        // On récupère le contenu de la table CONTENU en fonction de la SECTION,
        // -> On précise que l'on souhaite les éléments ayant "presensation" comme "Section"
        $presentations = $repo->findBySection('presentation');

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        // On crée un objet vide 
        $presentation = new Contenu;

        // On créé la vue d'un formulaire qui provient du dossier FORM > ContenuType.php 
        $form = $this->createForm(ContenuType::class, $presentation);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        // On traite les données du formulaire >> CF lignes 81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($presentation);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('presentationentreprise');
        }

        // On crée la variable date pour pouvoir ensuite généréer une date dynamique qui sera renvoyée dans le formulaire
        // Cela permet de générer une date, que l'on traitera ensuite pour classer les éléments 
        // Dans la VUE ADMIN >> prensatation-entreprise.html.twig ligne-25, on entre la variable dans le formulaire de façon automatique
        // Ce qui permet d'afficher seulement celle que l'on désire dans la vue SECTIONS >> section-présentation-etp.html.twig
        // Elle est ici vide, car pour l'affichage, cela n'est pas pertinent 
        $date = '';

        // Cette variable permet de changer la valeur dans le bouton d'envoi afin de le rendre dynmaqieu dans les différentes vues
        // Le bouton est adapté à chaque situation 
        $boutonenvoi = 'Envoyer';

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        // On renvoie les informations dans la VUE 

        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'presentations' => $presentations,
            'ContenuForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }

    /**
     * @Route("/admin/presentation-entreprise/delete/{id}", name="delete_presentation")
     */
    public function deletePresentation($id)
    {
        $manager = $this->getDoctrine()->getManager();
        // On récupère l'objet de la BDD en fonction de son *ID
        $presentation = $manager->find(Contenu::class, $id);

        // Grâce au MANAGER, on supprime l'élément de la BSS
        $manager->remove($presentation);
        $manager->flush();

        // On confirme à l'utilisateur que la suppression a bien été effectuée.
        $this->addFlash('success', 'Le texte de présentation a bien été supprimé.');
        return $this->redirectToRoute('presentationentreprise');

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        // On récupère les informations de BASE nécessaires 
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        // De nouveau, on créé des variables pour le dynamisme de la page 
        $date = '';
        $boutonenvoi = 'Envoyer';

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        // On renvoie les informations dans la VUE 
        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }


    /**
     * @Route("/admin/presentation-entreprise/update/{id}", name="update_presentation")
     */
    public function updatePresentation($id, ObjectManager $manager, Request $request)
    {
        // On récupère les informations en BDD 
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repo = $this->getDoctrine()->getRepository(Contenu::class);
        $presentations = $repo->findBySection('presentation');

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // ----------------------------------------------------------------------        
        // ----------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $presentation = $manager->find(Contenu::class, $id);

        // On créé la vue d'un formulaire qui provient du dossier FORM > ContenuType.php 
        $form = $this->createForm(ContenuType::class, $presentation);

        // On gère les informations du formulaire 
        $form->handleRequest($request);

        // Conditions du formulaire >> CF l.81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($presentation);

            $manager->flush();

            // Message qui confirme l'action et retour à la route 
            $this->addFlash('success', 'La présentation a bien été modifiée');
            return $this->redirectToRoute('presentationentreprise');
        }

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        // Ici, on indique que la variable $date passe à 0 pour que la date de l'entrée en BDD ne change pas
        // Elle passe à 0 ce qui nous permet dans le tri effectué pour l'affichage de la VUE SECTIONS => section-presentation-etp 
        // De n'afficher qu'une entrée : la plus récente 
        $date = '0';

        // Le $boutonenvoi devient modofier et non plus envoyer pour indiquer qu'on modifie
        $boutonenvoi = 'Modifier';

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        // On renvoie les informations dans la VUE 
        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'ContenuForm' => $form->createView(),
            'presentations' => $presentations,
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }

    /**
     * @Route("/admin/presentation-entreprise/affichage/{id}", name="affichage_presentation")
     */
    public function affichagePresentation($id, ObjectManager $manager, Request $request)
    {
        // On récupère les informations en BDD
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repo = $this->getDoctrine()->getRepository(Contenu::class);
        $presentations = $repo->findBySection('presentation');

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // ----------------------------------------------------------------------
        // ----------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $presentation = $manager->find(Contenu::class, $id);

        // On créé la vue d'un formulaire qui provient du dossier FORM > EntrepriseType.php 
        $form = $this->createForm(ContenuType::class, $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($presentation);

            $manager->flush();

            $this->addFlash('success', 'La présentation a bien été modifiée');
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

        return $this->render('admin/presentation-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'ContenuForm' => $form->createView(),
            'presentations' => $presentations,
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }

    /* ---------------------------------------------------------------------------------------------------

    ╦ ╦╦╔═╗╔╦╗╔═╗╦╦═╗╔═╗  ╔═╗╔╗╔╔╦╗╦═╗╔═╗╔═╗╦═╗╦╔═╗╔═╗
    ╠═╣║╚═╗ ║ ║ ║║╠╦╝║╣   ║╣ ║║║ ║ ╠╦╝║╣ ╠═╝╠╦╝║╚═╗║╣ 
    ╩ ╩╩╚═╝ ╩ ╚═╝╩╩╚═╚═╝  ╚═╝╝╚╝ ╩ ╩╚═╚═╝╩  ╩╚═╩╚═╝╚═╝

    --------------------------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------------------------------------
    /!\/!\/!\       TOUTES LES EXPLICATIONS DE PRÉSENSATION SONT VALABLES DANS CETTE PARTIE   /!\/!\/!\
    ----------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/histoire-entreprise", name="histoireentreprise")
     */
    public function histoireEntreprise(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );
        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findBySection('historique');

        // --------------------------------------------------------------------
        // -------------------------------------------------------------------


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

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $date = '';
        $boutonenvoi = 'Envoyer';

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'historiques' => $historiques,
            'ContenuForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }

    /**
     * @Route("/admin/histoire-entreprise/affichage/{id}", name="affichage_histoireEntreprise")
     */
    public function setStatutHistorique(Request $request, $id)
    {


        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );
        // -------------------------------------------------------------------
        // -------------------------------------------------------------------


        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findBySection('historique');

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------


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

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $date = date("Y-m-d H-i-s");
        $boutonenvoi = 'Publier';

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'historiques' => $historiques,
            'ContenuForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }


    /**
     * @Route("/admin/histoire-entreprise/update/{id}", name="update_histoireEntreprise")
     */
    public function updateHistoireEntreprise($id, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findBySection('historique');

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

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

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $date = '0';
        $boutonenvoi = 'Modifier';

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        return $this->render('admin/histoire-entreprise.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'historiques' => $historiques,
            'ContenuForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
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

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------


        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------


        $date = '';
        $boutonenvoi = 'Envoyer';

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------


        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }

    /* ---------------------------------------------------------------------------------------------------
    ╔═╗╔═╗╔═╗╔═╗╦╔═╗╦╔═╗╦╔╦╗╔═╗╔═╗
    ╚═╗╠═╝║╣ ║  ║╠╣ ║║  ║ ║ ║╣ ╚═╗
    ╚═╝╩  ╚═╝╚═╝╩╚  ╩╚═╝╩ ╩ ╚═╝╚═╝
--------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/specificites", name="specificites")
     */
    public function competences(Request $request)
    {
        // On récupère les informations nécessaires à la VUE
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------


        $manager = $this->getDoctrine()->getManager();

        // On traite les données du formulaire >> CF L.81-85
        $form = $this->createForm(SpecificitesType::class, $specificites);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($specificites);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('admin');
        }

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE
        return $this->render('admin/specificites.html.twig', [
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'specificitesForm' => $form->createView(),
            'couleurs' => $couleurs
        ]);
    }

    /* ---------------------------------------------------------------------------------------------------
   
    ╔═╗╔═╗╦═╗╔╦╗╔═╗╔╗╔╔═╗╦╦═╗╔═╗
    ╠═╝╠═╣╠╦╝ ║ ║╣ ║║║╠═╣║╠╦╝║╣ 
    ╩  ╩ ╩╩╚═ ╩ ╚═╝╝╚╝╩ ╩╩╩╚═╚═╝

    --------------------------------------------------------------------------------------------------- */

    /**
     * @Route("/admin/partenaires", name="partenaires")
     */
    public function partenaires(Request $request)
    {
        // On créé une variable vide 
        $logo = new Partenaires; //objet vide

        // On traite le formulaire, on envoie les infos en BDD, on confirme l'action par un message 
        $form = $this->createForm(PartenairesType::class, $logo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($logo);

            // On applique une condition
            // Si on a bien un fichier choisit, alors on l'envoie 
            if ($logo->getFile() != NULL) {
                $logo->uploadFile();
            }

            $manager->flush();

            $this->addFlash('success', 'Le partenaire a bien été ajouté !');
        }

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        // On récupère les informations nécessaires en BDD 
        $repository = $this->getDoctrine()->getRepository(Partenaires::class);
        $logos = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        // On renvoie les informations à la vue 
        return $this->render('admin/partenaires.html.twig', [
            'PartenairesForm' => $form->createView(),
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'logos' => $logos,
            'couleurs' => $couleurs
        ]);
    }

    /**
     * Supprime un partenaire
     * @Route("/admin/partenaires/delete/{id}", name="delete_partenaire")
     */
    public function deletePartenaire($id)
    {
        $manager = $this->getDoctrine()->getManager();
        // On récupère les informations d'un partenaire par son $ID
        $partenaire = $manager->find(Partenaires::class, $id);

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        // On supprime le logo puis le partenaire et on enregistre/envoie l'information en BDD 
        $partenaire->removeLogo();
        $manager->remove($partenaire);
        $manager->flush();

        // Message de réussite / validation de l'action
        $this->addFlash('success', 'Le partenaire a bien été supprimé');
        return $this->redirectToRoute('partenaires');

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        // On récupère les informations nécessaires à l'affichage de la vue 
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        // On renvoie les informations nécessaires à la VUE 
        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'couleurs' => $couleurs
        ]);
    }

    /* ---------------------------------------------------------------------------------------------------
       ╔╦╗╔═╗╦═╗╦╔═╗╔═╗
        ║ ╠═╣╠╦╝║╠╣ ╚═╗
        ╩ ╩ ╩╩╚═╩╚  ╚═╝
    --------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/tarifs", name="tarifs-admin")
     */
    public function tarifsAdmin(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $repository = $this->getDoctrine()->getRepository(Tarifs::class);
        $tarifs = $repository->findAll();

        // --------------------------------------------------------------------
        // -------------------------------------------------------------------

        $boutonenvoi = 'Ajouter';

        $tarif = new Tarifs;

        $form = $this->createForm(TarifsType::class, $tarif);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($tarif);

            $manager->flush();

            $this->addFlash('success', 'La prestation a été ajoutée ! ');
            return $this->redirectToRoute('tarifs-admin');
        }

        return $this->render('admin/tarifs.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'tarifs' => $tarifs,
            'TarifsForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }


    /**
     * @Route("/admin/tarifs/update/{id}", name="update_tarifs-admin")
     */
    public function updateTarifsAdmin($id, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Tarifs::class);
        $tarifs = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $boutonenvoi = 'Modifier';

        $manager = $this->getDoctrine()->getManager();
        $tarif = $manager->find(Tarifs::class, $id);


        $form = $this->createForm(TarifsType::class, $tarif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($tarif);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('tarifs-admin');
        }



        return $this->render('admin/tarifs.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'tarifs' => $tarifs,
            'TarifsForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs

        ]);
    }

    /**
     * @Route("/admin/tarifs/delete/{id}", name="delete_tarifs-admin")
     */
    public function deleteTarifsAdmin($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $tarif = $manager->find(Tarifs::class, $id);

        $manager->remove($tarif);
        $manager->flush();

        $this->addFlash('success', 'La presation a bien été supprimée.');
        return $this->redirectToRoute('tarifs-admin');

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------


        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );


        return $this->render('admin/espaceadmin.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs


        ]);
    }

    /* ---------------------------------------------------------------------------------------------------
      HORAIRES
    --------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/horaires", name="horaires-admin")
     */
    public function horairesAdmin(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();
        // --------------------------------------------------------------------
        // -------------------------------------------------------------------

        $boutonenvoi = 'Ajouter';

        $horaire = new Horaires;

        $form = $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($horaire);

            $manager->flush();

            $this->addFlash('success', 'L\'horaire a été ajoutée ! ');
            return $this->redirectToRoute('horaires-admin');
        }

        return $this->render('admin/horaires.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'horaires' => $horaires,
            'HorairesForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs
        ]);
    }


    /**
     * @Route("/admin/horaires/update/{id}", name="update_horaires-admin")
     */
    public function updateHorairesAdmin($id, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------

        $boutonenvoi = 'Modifier';

        $manager = $this->getDoctrine()->getManager();
        $horaire = $manager->find(Horaires::class, $id);


        $form = $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($horaire);

            $manager->flush();

            $this->addFlash('success', 'Les modifications de l\'horaire ont été effectuées ! ');
            return $this->redirectToRoute('horaires-admin');
        }



        return $this->render('admin/horaires.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'horaires' => $horaires,
            'HorairesForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi,
            'couleurs' => $couleurs

        ]);
    }

    /**
     * @Route("/admin/horaires/delete/{id}", name="delete_horaires-admin")
     */
    public function deleteHorairesAdmin($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $horaire = $manager->find(Horaires::class, $id);

        $manager->remove($horaire);
        $manager->flush();

        $this->addFlash('success', 'L\'horaire a bien été supprimée.');
        return $this->redirectToRoute('horaires-admin');

        // -------------------------------------------------------------------
        // -------------------------------------------------------------------


        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );
    }


    /* ---------------------------------------------------------------------------------------------------
      AIDE & SUPPORT 
    --------------------------------------------------------------------------------------------------- */

    /**
     * @Route("/admin/aide-support", name="aide-support")
     */
    public function aideSupport(Request $request,  \Swift_Mailer $mailer): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneByRole(array('role' => 'ROLE_ADMIN'));

        $mailclient = $user->getEmail();

        if ($request->isMethod('POST')) {

            $objet = $request->request->get('objet');
            $probleme = $request->request->get('probleme');


            $message = (new \Swift_Message('TICKET INTERVENTION '))
                ->setFrom($user->getEmail())
                ->setTo('test.mbmp@gmail.com')
                ->setBody(
                    "<h1> Ticket d'intervention pour " . $mailclient . " </h1><hr><hr><b><u> Objet du problème : </u></b>" . $objet . "<hr><b><u>Message : </u></b>" . $probleme,
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('notice', 'Mail envoyé');

            return $this->redirectToRoute('aide-support');
        }

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Specificites::class);
        $specificites = $repository->findOneById(1);

        return $this->render('admin/aide-support.html.twig', [
            'controller_name' => 'AdminController',
            'entreprise' => $entreprise,
            'specificites' => $specificites,
            'user' => $user
        ]);
    }
}
