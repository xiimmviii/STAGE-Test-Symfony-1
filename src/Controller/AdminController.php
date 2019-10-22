<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\Mobile;
use App\Entity\Tarifs;
use App\Entity\Contenu;
use App\Entity\Couleur;
use App\Entity\Galerie;
use App\Entity\Picture;
use App\Entity\Reseaux;
use App\Entity\Horaires;
use App\Form\MobileType;
use App\Form\TarifsType;
use App\Form\ContenuType;
use App\Form\GalerieType;
use App\Form\PictureType;
use App\Form\ReseauxType;
use App\Entity\Entreprise;
use App\Form\HorairesType;
use App\Entity\Competences;
use App\Entity\Partenaires;
use App\Entity\Localisation;
use App\Form\EntrepriseType;
use App\Form\GalerieBisType;
use App\Form\CompetencesType;
use App\Form\PartenairesType;
use App\Form\LocalisationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class AdminController extends AbstractController
{
    /**
     * Récupérer les informations (en BDD) qui apparaissent sur la vue de base (header+footer) >> BASE.html.twig 
     * @Route("/admin", name="admin")
     */
    public function admin()
    {

        // Cette fonction est vide car elle n'a besoin d'aucune information pour fonctionner/s'afficher 

        // -------------------------------------------------------------------------

        // On retourne ensuite les éléments récupérés dans la vue 
        // Qu'on injectera entre {{}} dans la vue twig ADMIN -> espaceadmin.html.twig
        return $this->render('admin/espaceadmin.html.twig', []);
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
            'entreprise' => $entreprise,
            'EntrepriseForm' => $form->createView(),
        ]);
    }


    /* ---------------------------------------------------------------------------------------------------
    ╔═╗╔═╗╦  ╔═╗╦═╗╦╔═╗  ╔═╗╦ ╦╔═╗╔╦╗╔═╗╔═╗
    ║ ╦╠═╣║  ║╣ ╠╦╝║║╣   ╠═╝╠═╣║ ║ ║ ║ ║╚═╗
    ╚═╝╩ ╩╩═╝╚═╝╩╚═╩╚═╝  ╩  ╩ ╩╚═╝ ╩ ╚═╝╚═╝
    --------------------------------------------------------------------------------------------------- */


    /**
     * Permet d'ajouter une galerie grâce à un formulaire et affiche les galeries existantes, leurs photos et les boutons pour les modifiers/supprimer
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

            // On retourne à la vue >> Admin > GestionGaleries 
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



        // On envoie toutes les informations dans la vue GestionGaleries.html.twig
        return $this->render('admin/gestiongaleries.html.twig', [
            'galerieForm' => $form->createView(),
            'galeries' => $galeries,
            'totalGaleries' => $totalGaleries,
        ]);
    }



    /**
     * Supprime une photo dans la galerie via le panneau d'Admin 
     * @Route("/admin/galeriephotos/delete_photo/{id}", name="delete_photo")
     */
    public function deletePhoto($id)
    {
        // On récupère le MANAGER pour pouvoir gérer les informations en BDD >> Picture
        $manager = $this->getDoctrine()->getManager();

        // On trouve l'élément concerné dans la table Picture via son $ID et on lui applique une variable
        $photo = $manager->find(Picture::class, $id);


        // Le MANAGER enregistre l'info et transmet ensuite à la BDD la suppression de l'objet
        // NOTE : Grâce au bundle VICH, le fichier de la photo est lui aussi supprimé en automatique dans le dossier de destination. (Pas besoin de créer le code pour cette suppression)
        $manager->remove($photo);
        $manager->flush();

        // Message de succès et renvoi à la vue ADMIN >> Galerie Photos 
        $this->addFlash('success', 'La photo a bien été supprimée.');
        return $this->redirectToRoute('gestiongaleries');

        // ----------------------------------------------------------------------

        return $this->render('admin/gestiongalerie.html.twig', []);
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

        return $this->render('admin/gestiongaleries.html.twig', []);
    }


    /**
     * Ajoute/supprime une photo dans une galerie précise et permet de modifier le texte/nom de la galerie
     * @Route("/admin/modifiergalerie/{id}", name="modifiergalerie")
     */
    public function modifierGalerie(Request $request, $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $galerie1 = $manager->find(Galerie::class, $id);

        //------ Modification du texte et titres

        // On créé la vue d'un formulaire qui provient du dossier FORM > GalerieBisType.php 
        $form = $this->createForm(GalerieBisType::class, $galerie1);

        // On gère les informations du formulaire 
        $form->handleRequest($request);

        // Conditions du formulaire >> CF l.81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($galerie1);

            $manager->flush();

            // Message qui confirme l'action et retour à la route 
            $this->addFlash('success', 'La galerie a bien été modifiée');
            return $this->redirectToRoute('gestiongaleries');
        }

        //-----------Ajout de photo

        // On crée un objet vide qu'on pourra ensuite réutiliser
        $pic = new Picture;

        //on crée la variable $galerieId pour que l'image ajoutée appartienne bien à la galerie en question
        $galerieId = $id;


        // On créé la vue d'un formulaire qui provient du dossier FORM > PictureType.php 
        $formPic = $this->createForm(PictureType::class, $pic);

        // On gère les informations du formulaire 
        $formPic->handleRequest($request);

        // Conditions du formulaire >> CF l.81/85
        if ($formPic->isSubmitted() && $formPic->isValid()) {

            $manager->persist($pic);

            $manager->flush();

            // Message qui confirme l'action et retour à la route 
            $this->addFlash('success', 'La photo a bien été ajoutée');
            return $this->redirectToRoute('gestiongaleries');
        }

        //----------------------------

        // On récupère toutes les photos déjà dans la BDD
        $repository = $this->getDoctrine()->getRepository(Picture::class);
        // On choisit de n'afficher que les photos qui sont contenues dans la galerie en question grâce au lien entre les deux tables.
        // Le champ "galerie" de la table PICTURE correspond à l'ID de la galerie qui contient la photo
        //On cherche donc toutes les photos dans la table PICTURE dont le champ GALERIE correspond à l'ID de la galerie à modifier. 
        $pictures = $repository->findByGalerie($id);


        //-------------------------------------------------------------

        // On veut limiter le nombre de photos dans une galerie à 4. 

        // On récupère le manager
        $em = $this->getDoctrine()->getManager();

        // On va dans l'entité Picture
        $repo = $em->getRepository(Picture::class);

        // On crée une variable galerie dans laquelle on injecte la valeur de l'ID de la galerie à modifier
        $galerie = $id;


        // On fait une requête pour compter combien de galeries il y a dans la table Galerie (galerie = g)
        $totalPictures = $repo->createQueryBuilder('p')
            // On séléctionne comment on compte les lignes (par l'id)
            ->select('count(p.id)')
            // On met une condition : le champ galerie doit correspondre à "nb"
            ->where('p.galerie = :nb')
            // On crée le paramètre pour définir "nb" qui vaut la variable $galerie, CAD l'ID de la galerie à modifier
            ->setParameter('nb', $galerie)
            ->getQuery()
            ->getResult();

        //-------------------------------------------------------------

        return $this->render('admin/modifiergalerie.html.twig', [
            'galerieBisForm' => $form->createView(),
            'pictureForm' => $formPic->createView(),
            'pictures' => $pictures,
            'totalPictures' => $totalPictures,
            'galerieId' => $galerieId,
        ]);
    }



    /* ---------------------------------------------------------------------------------------------------

    ╦ ╦╦╔═╗╔╦╗╔═╗╦╦═╗╔═╗  ╔═╗╔╗╔╔╦╗╦═╗╔═╗╔═╗╦═╗╦╔═╗╔═╗
    ╠═╣║╚═╗ ║ ║ ║║╠╦╝║╣   ║╣ ║║║ ║ ╠╦╝║╣ ╠═╝╠╦╝║╚═╗║╣ 
    ╩ ╩╩╚═╝ ╩ ╚═╝╩╩╚═╚═╝  ╚═╝╝╚╝ ╩ ╩╚═╚═╝╩  ╩╚═╩╚═╝╚═╝

    --------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/histoire-entreprise", name="histoireentreprise")
     */
    public function histoireEntreprise(Request $request)
    {

        // -------------------------------------------------------------------

        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findAll();

        // --------------------------------------------------------------------

        // On crée un objet vide 
        $historique = new Contenu;

        // On créé la vue d'un formulaire qui provient du dossier FORM > ContenuType.php 
        $form = $this->createForm(ContenuType::class, $historique);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        // On traite les données du formulaire >> CF lignes 81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($historique);

            $manager->flush();

            $this->addFlash('success', 'Le texte de présentation de l\'histoire a été ajouté ! ');
            return $this->redirectToRoute('histoireentreprise');
        }

        // -------------------------------------------------------------------

        // On crée la variable date pour pouvoir ensuite générer une date dynamique qui sera renvoyée dans le formulaire
        // Cela permet de générer une date, que l'on traitera ensuite pour classer les éléments 
        // Dans la VUE ADMIN >> histoire-entreprise.html.twig ligne-25, on entre la variable dans le formulaire de façon automatique
        // Ce qui permet d'afficher seulement celle que l'on désire dans la vue SECTIONS >> section-historique-etp.html.twig
        // Elle est ici vide, car pour l'affichage, cela n'est pas pertinent 

        $date = '';


        // Cette variable permet de changer la valeur dans le bouton d'envoi afin de le rendre dynamique dans les différentes vues
        // Le bouton est adapté à chaque situation 
        $boutonenvoi = 'Envoyer';

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE 

        return $this->render('admin/histoire-entreprise.html.twig', [
            'historiques' => $historiques,
            'ContenuForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
        ]);
    }

    /**
     * @Route("/admin/histoire-entreprise/affichage/{id}", name="affichage_histoireEntreprise")
     */
    public function setHistorique(Request $request, $id)
    {



        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findAll();

        // -------------------------------------------------------------------


        $manager = $this->getDoctrine()->getManager();
        $historique = $manager->find(Contenu::class, $id);


        // On créé la vue d'un formulaire qui provient du dossier FORM > ContenuType.php 
        $form = $this->createForm(ContenuType::class, $historique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($historique);

            $manager->flush();

            $this->addFlash('success', ' Le texte de présentation de l\'histoire a été publié ! ');
            return $this->redirectToRoute('histoireentreprise');
        }

        // -------------------------------------------------------------------

        // Dans ce cas-là, on modifie la variable date pour que la date actuelle soit générée
        // Cela nous permet d'avoir la date la plus recénte qui permet un affichage dans la VUE principale
        // C-A-D qu'on trie par DATE DESC et qu'on affiche 1 seule valeur 
        $date = date("Y-m-d H-i-s");

        // La variable permet à l'utilsateur de voir "publier" de façon dynamique
        // Et non pas envoyer ou modifier comme les vues précédentes 
        $boutonenvoi = 'Publier';

        // -------------------------------------------------------------------

        return $this->render('admin/histoire-entreprise.html.twig', [
            'historiques' => $historiques,
            'ContenuForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
        ]);
    }


    /**
     * @Route("/admin/histoire-entreprise/update/{id}", name="update_histoireEntreprise")
     */
    public function updateHistoireEntreprise($id, Request $request)
    {


        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findAll();

        // -------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $historique = $manager->find(Contenu::class, $id);


        // On créé la vue d'un formulaire qui provient du dossier FORM > ContenuType.php 
        $form = $this->createForm(ContenuType::class, $historique);

        // On gère les informations du formulaire
        $form->handleRequest($request);

        // Conditions du formulaire >> CF l.81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($historique);

            $manager->flush();

            // Message qui confirme l'action et retour à la route 
            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('histoireentreprise');
        }


        // -------------------------------------------------------------------

        // Ici, on indique que la variable $date passe à 0 pour que la date de l'entrée en BDD ne change pas
        // Elle passe à 0 ce qui nous permet dans le tri effectué pour l'affichage de la VUE SECTIONS => section-histoire-etp 
        // De n'afficher qu'une entrée : la plus récente 
        $date = '0';

        // Le $boutonenvoi devient modofier et non plus envoyer pour indiquer qu'on modifie
        $boutonenvoi = 'Modifier';

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE 
        return $this->render('admin/histoire-entreprise.html.twig', [

            'historiques' => $historiques,
            'ContenuForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi,
        ]);
    }

    /**
     * @Route("/admin/histoire-entreprise/delete/{id}", name="delete_historiqueEntreprise")
     */
    public function deleteHistoireEntreprise($id)
    {
        $manager = $this->getDoctrine()->getManager();
        // On récupère l'objet de la BDD en fonction de son *ID
        $historique = $manager->find(Contenu::class, $id);

        // Grâce au MANAGER, on supprime l'élément de la BDD
        $manager->remove($historique);
        $manager->flush();

        // On confirme à l'utilisateur que la suppression a bien été effectuée.
        $this->addFlash('success', 'Le texte de présentation a bien été supprimé.');
        return $this->redirectToRoute('histoireentreprise');

        // -------------------------------------------------------------------


        // On renvoie les informations dans la VUE
        return $this->render('admin/espaceadmin.html.twig', []);
    }

    /* ---------------------------------------------------------------------------------------------------


        ╦═╗╔═╗╔═╗╔═╗╔═╗╦ ╦═╗ ╦  ╔═╗╔═╗╔═╗╦╔═╗╦ ╦═╗ ╦
        ╠╦╝║╣ ╚═╗║╣ ╠═╣║ ║╔╩╦╝  ╚═╗║ ║║  ║╠═╣║ ║╔╩╦╝
        ╩╚═╚═╝╚═╝╚═╝╩ ╩╚═╝╩ ╚═  ╚═╝╚═╝╚═╝╩╩ ╩╚═╝╩ ╚═

--------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/reseaux", name="reseaux")
     */
    public function reseaux(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


        // -------------------------------------------------------------------


        $manager = $this->getDoctrine()->getManager();

        // On traite les données du formulaire >> CF L.81-85
        $form = $this->createForm(ReseauxType::class, $reseaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($reseaux);

            $manager->flush();

            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('reseaux');
        }

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE
        return $this->render('admin/reseaux.html.twig', [
            'reseaux' => $reseaux,
            'ReseauxForm' => $form->createView(),
        ]);
    }



    /* ------------------------------------------------------------------------------


        ╦  ╔═╗╔═╗╔═╗╦  ╦╔═╗╔═╗╔╦╗╦╔═╗╔╗╔╔═╗
        ║  ║ ║║  ╠═╣║  ║╚═╗╠═╣ ║ ║║ ║║║║╚═╗
        ╩═╝╚═╝╚═╝╩ ╩╩═╝╩╚═╝╩ ╩ ╩ ╩╚═╝╝╚╝╚═╝


--------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/localisation", name="localisation")
     */
    public function localisation(Request $request)
    {


        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findAll();

        // -------------------------------------------------------------------

        $localisation = new Localisation;

        $manager = $this->getDoctrine()->getManager();

        // On traite les données du formulaire >> CF L.81-85
        $form = $this->createForm(LocalisationType::class, $localisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($localisation);

            $manager->flush();

            $this->addFlash('success', 'La localisation a été ajoutée ! ');
            return $this->redirectToRoute('localisation');
        }

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


        // On renvoie les informations dans la VUE
        return $this->render('admin/localisation.html.twig', [
            'localisations' => $localisations,
            'LocalisationForm' => $form->createView(),
            'totalLocalisations' => $totalLocalisations
        ]);
    }

    /**
     * @Route("/admin/localisation/delete/{id}", name="localisation-delete")
     */
    public function localisationDelete($id)
    {

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findAll();


        // -------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $local = $manager->find(Localisation::class, $id);

        $manager->remove($local);
        $manager->flush();

        $this->addFlash('success', 'Localisation supprimée.');
        return $this->redirectToRoute('localisation');

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE
        return $this->render('admin/localisation.html.twig', [
            'localisations' => $localisations,
        ]);
    }

    /* ------------------------------------------------------------------------------

        ╔═╗╔═╗╔╦╗╔═╗╔═╗╔╦╗╔═╗╔╗╔╔═╗╔═╗╔═╗
        ║  ║ ║║║║╠═╝║╣  ║ ║╣ ║║║║  ║╣ ╚═╗
        ╚═╝╚═╝╩ ╩╩  ╚═╝ ╩ ╚═╝╝╚╝╚═╝╚═╝╚═╝

--------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/competences", name="competences")
     */
    public function competence(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll(1);

        // -------------------------------------------------------------------

        $competence = new Competences;

        $manager = $this->getDoctrine()->getManager();

        // On traite les données du formulaire >> CF L.81-85
        $form = $this->createForm(CompetencesType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($competence);

            $manager->flush();

            $this->addFlash('success', 'La compétence a été ajoutée ! ');
            return $this->redirectToRoute('competences');
        }

        // ----------------------------------------------------------------------

        //On veut limiter le nombre de competences possibles à 10. 

        // On récupère le manager
        $em = $this->getDoctrine()->getManager();

        // On va dans l'entité Competence
        $repo = $em->getRepository(Competences::class);

        // On fait une requête pour compter combien de galeries il y a dans la table Galerie (galerie = g)
        $totalCompetences = $repo->createQueryBuilder('c')
            //on séléctionne comment on compte les lignes (par l'id)
            ->select('count(c.id)')
            ->getQuery()
            ->getResult();

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE
        return $this->render('admin/competences.html.twig', [
            'competences' => $competences,
            'CompetenceForm' => $form->createView(),
            'totalCompetences' => $totalCompetences
        ]);
    }

    /**
     * @Route("/admin/competences/delete/{id}", name="competences-delete")
     */
    public function competenceDelete($id)
    {

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll();

        // -------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $local = $manager->find(Competences::class, $id);

        $manager->remove($local);
        $manager->flush();

        $this->addFlash('success', 'Compétence supprimée.');
        return $this->redirectToRoute('competences');

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE
        return $this->render('admin/competence.html.twig', [
            'competences' => $competences
        ]);
    }

    /* ---------------------------------------------------------------------------------------------------

    ╔═╗╔═╗╦═╗╔╦╗╔═╗╔╗╔╔═╗╦╦═╗╔═╗╔═╗
    ╠═╝╠═╣╠╦╝ ║ ║╣ ║║║╠═╣║╠╦╝║╣ ╚═╗
    ╩  ╩ ╩╩╚═ ╩ ╚═╝╝╚╝╩ ╩╩╩╚═╚═╝╚═╝

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

        $repository = $this->getDoctrine()->getRepository(Partenaires::class);
        $logos = $repository->findAll();

        // -------------------------------------------------------------------


        // On renvoie les informations à la vue 
        return $this->render('admin/partenaires.html.twig', [
            'PartenairesForm' => $form->createView(),
            'logos' => $logos,
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

        // On supprime le logo puis le partenaire et on enregistre/envoie l'information en BDD 
        $partenaire->removeLogo();
        $manager->remove($partenaire);
        $manager->flush();

        // Message de réussite / validation de l'action
        $this->addFlash('success', 'Le partenaire a bien été supprimé');
        return $this->redirectToRoute('partenaires');

        // -------------------------------------------------------------------

        // On renvoie les informations nécessaires à la VUE 
        return $this->render('admin/partenaires.html.twig', []);
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

        $repository = $this->getDoctrine()->getRepository(Tarifs::class);
        $tarifs = $repository->findAll();

        // --------------------------------------------------------------------

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
            'tarifs' => $tarifs,
            'TarifsForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi,
        ]);
    }


    /**
     * @Route("/admin/tarifs/update/{id}", name="update_tarifs-admin")
     */
    public function updateTarifsAdmin($id, Request $request)
    {


        $repository = $this->getDoctrine()->getRepository(Tarifs::class);
        $tarifs = $repository->findAll();


        // -------------------------------------------------------------------


        $boutonenvoi = 'Modifier';

        $manager = $this->getDoctrine()->getManager();
        $tarif = $manager->find(Tarifs::class, $id);


        $form = $this->createForm(TarifsType::class, $tarif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($tarif);

            $manager->flush();

            $this->addFlash('success', 'Les modifications sur la prestation ont été effectuées ! ');
            return $this->redirectToRoute('tarifs-admin');
        }

        // --------------------------------------------------------------

        return $this->render('admin/tarifs.html.twig', [
            'tarifs' => $tarifs,
            'TarifsForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi
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

        $this->addFlash('success', 'La prestation a bien été supprimée.');
        return $this->redirectToRoute('tarifs-admin');

        // -------------------------------------------------------------------

        return $this->render('admin/espaceadmin.html.twig', []);
    }

    /* ---------------------------------------------------------------------------------------------------

            ╦ ╦╔═╗╦═╗╔═╗╦╦═╗╔═╗╔═╗
            ╠═╣║ ║╠╦╝╠═╣║╠╦╝║╣ ╚═╗
            ╩ ╩╚═╝╩╚═╩ ╩╩╩╚═╚═╝╚═╝


--------------------------------------------------------------------------------------------------- */


    /**
     * @Route("/admin/horaires", name="horaires-admin")
     */
    public function horairesAdmin(Request $request)
    {


        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        // --------------------------------------------------------------------


        $boutonenvoi = 'Ajouter';

        $horaire = new Horaires;

        $form = $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($horaire);

            $manager->flush();

            $this->addFlash('success', 'L\'horaire a été ajouté ! ');
            return $this->redirectToRoute('horaires-admin');
        }

        // ----------------------------------------------------------------------

        return $this->render('admin/horaires.html.twig', [
            'horaires' => $horaires,
            'HorairesForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi,
        ]);
    }


    /**
     * @Route("/admin/horaires/update/{id}", name="update_horaires-admin")
     */
    public function updateHorairesAdmin($id, Request $request)
    {


        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

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

        // -----------------------------------------------------------------

        return $this->render('admin/horaires.html.twig', [
            'horaires' => $horaires,
            'HorairesForm' => $form->createView(),
            'boutonenvoi' => $boutonenvoi,

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

        $this->addFlash('success', 'L\'horaire a bien été supprimé.');
        return $this->redirectToRoute('horaires-admin');
    }


    /* ---------------------------------------------------------------------------------------------------


        ╔═╗╦╔╦╗╔═╗  ╔═╗╔╦╗  ╔═╗╦ ╦╔═╗╔═╗╔═╗╦═╗╔╦╗
        ╠═╣║ ║║║╣   ║╣  ║   ╚═╗║ ║╠═╝╠═╝║ ║╠╦╝ ║ 
        ╩ ╩╩═╩╝╚═╝  ╚═╝ ╩   ╚═╝╚═╝╩  ╩  ╚═╝╩╚═ ╩ 


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

            $this->addFlash('notice', 'Mail envoyé !');

            return $this->redirectToRoute('aide-support');
        }


        return $this->render('admin/aide-support.html.twig', [
            'user' => $user
        ]);
    }




    /* ---------------------------------------------------------------------------------------------------

  
    ╔═╗╔═╗╔╗╔╔╦╗╔═╗╔╗╔╦ ╦  ╔╦╗╔═╗╔╗ ╦╦  ╔═╗
    ║  ║ ║║║║ ║ ║╣ ║║║║ ║  ║║║║ ║╠╩╗║║  ║╣ 
    ╚═╝╚═╝╝╚╝ ╩ ╚═╝╝╚╝╚═╝  ╩ ╩╚═╝╚═╝╩╩═╝╚═╝


    --------------------------------------------------------------------------------------------------- */

    /**
     * @Route("/admin/contenu-mobile", name="contenumobile")
     */
    public function contenuMobile(Request $request)
    {



        $repository = $this->getDoctrine()->getRepository(Mobile::class);
        $mobiles = $repository->findAll();

        // --------------------------------------------------------------------

        // On crée un objet vide 
        $mobile = new Mobile;

        // On créé la vue d'un formulaire qui provient du dossier FORM > MobileType.php 
        $form = $this->createForm(MobileType::class, $mobile);
        $form->handleRequest($request);

        $manager = $this->getDoctrine()->getManager();

        // On traite les données du formulaire >> CF lignes 81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($mobile);

            $manager->flush();

            $this->addFlash('success', ' Vous avez créé un nouveau texte pour la version mobile ! ');
            return $this->redirectToRoute('contenumobile');
        }

        // -------------------------------------------------------------------

        // On crée la variable date pour pouvoir ensuite générer une date dynamique qui sera renvoyée dans le formulaire
        // Cela permet de générer une date, que l'on traitera ensuite pour classer les éléments 
        // Dans la VUE ADMIN >> histoire-entreprise.html.twig ligne-25, on entre la variable dans le formulaire de façon automatique
        // Ce qui permet d'afficher seulement celle que l'on désire dans la vue SECTIONS >> section-mobile-etp.html.twig
        // Elle est ici vide, car pour l'affichage, cela n'est pas pertinent 

        $date = '';


        // Cette variable permet de changer la valeur dans le bouton d'envoi afin de le rendre dynamique dans les différentes vues
        // Le bouton est adapté à chaque situation 
        $boutonenvoi = 'Envoyer';

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE 

        return $this->render('admin/contenu-mobile.html.twig', [
            'mobiles' => $mobiles,
            'MobileForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }

    /**
     * @Route("/admin/contenu-mobile/affichage/{id}", name="affichage_contenu-mobile")
     */
    public function setStatutMobile(Request $request, $id)
    {

        $repository = $this->getDoctrine()->getRepository(Mobile::class);
        $mobiles = $repository->findAll();

        // -------------------------------------------------------------------


        $manager = $this->getDoctrine()->getManager();
        $mobile = $manager->find(Mobile::class, $id);


        // On créé la vue d'un formulaire qui provient du dossier FORM > MobileType.php 
        $form = $this->createForm(MobileType::class, $mobile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($mobile);

            $manager->flush();

            $this->addFlash('success', 'Le nouveau texte a été publié ! ');
            return $this->redirectToRoute('contenumobile');
        }

        // -------------------------------------------------------------------

        // Dans ce cas-là, on modifie la variable date pour que la date actuelle soit générée
        // Cela nous permet d'avoir la date la plus recénte qui permet un affichage dans la VUE principale
        // C-A-D qu'on trie par DATE DESC et qu'on affiche 1 seule valeur 
        $date = date("Y-m-d H-i-s");

        // La variable permet à l'utilsateur de voir "publier" de façon dynamique
        // Et non pas envoyer ou modifier comme les vues précédentes 
        $boutonenvoi = 'Publier';

        // -------------------------------------------------------------------

        return $this->render('admin/contenu-mobile.html.twig', [
            'mobiles' => $mobiles,
            'MobileForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }


    /**
     * @Route("/admin/contenu-mobile/update/{id}", name="update_contenu-mobile")
     */
    public function updateContenuMobile($id, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Mobile::class);
        $mobiles = $repository->findAll();


        // -------------------------------------------------------------------

        $manager = $this->getDoctrine()->getManager();
        $mobile = $manager->find(Mobile::class, $id);


        // On créé la vue d'un formulaire qui provient du dossier FORM > MobileType.php 
        $form = $this->createForm(MobileType::class, $mobile);

        // On gère les informations du formulaire
        $form->handleRequest($request);

        // Conditions du formulaire >> CF l.81/85
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($mobile);

            $manager->flush();

            // Message qui confirme l'action et retour à la route 
            $this->addFlash('success', 'Les modifications ont été effectuées ! ');
            return $this->redirectToRoute('contenumobile');
        }


        // -------------------------------------------------------------------

        // Ici, on indique que la variable $date passe à 0 pour que la date de l'entrée en BDD ne change pas
        // Elle passe à 0 ce qui nous permet dans le tri effectué pour l'affichage de la VUE SECTIONS => section-histoire-etp 
        // De n'afficher qu'une entrée : la plus récente 
        $date = '0';

        // Le $boutonenvoi devient modofier et non plus envoyer pour indiquer qu'on modifie
        $boutonenvoi = 'Modifier';

        // -------------------------------------------------------------------

        // On renvoie les informations dans la VUE 
        return $this->render('admin/contenu-mobile.html.twig', [
            'mobiles' => $mobiles,
            'MobileForm' => $form->createView(),
            'date' => $date,
            'boutonenvoi' => $boutonenvoi
        ]);
    }

    /**
     * @Route("/admin/contenu-mobile/delete/{id}", name="delete_contenu-mobile")
     */
    public function deleteContenuMobile($id)
    {
        $manager = $this->getDoctrine()->getManager();
        // On récupère l'objet de la BDD en fonction de son *ID
        $mobile = $manager->find(Mobile::class, $id);

        // Grâce au MANAGER, on supprime l'élément de la BDD
        $manager->remove($mobile);
        $manager->flush();

        // On confirme à l'utilisateur que la suppression a bien été effectuée.
        $this->addFlash('success', 'Le texte pour la version mobile a bien été supprimé.');
        return $this->redirectToRoute('contenumobile');


        // On renvoie les informations dans la VUE
        return $this->render('admin/espaceadmin.html.twig', []);
    }
}
