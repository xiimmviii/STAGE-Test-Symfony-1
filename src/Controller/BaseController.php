<?php

namespace App\Controller;

use App\Entity\Design;
use App\Entity\Tarifs;
use App\Entity\Contenu;
use App\Entity\Couleur;
use App\Entity\Galerie;
use App\Entity\Reseaux;
use App\Entity\Horaires;
use App\Form\ContactType;
use App\Entity\Entreprise;
use App\Entity\Competences;
use App\Entity\Partenaires;
use App\Entity\Localisation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{

    /**
     * page d'index, affiche les sections
     * @Route("/", name="index")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {

        //la page d'index affiche pratiquement toutes les infos stockées dans la BDD, on utilise donc le repository et doctrine pour récupérer les données dans chaque table qu'on injecte dans des objets ($logos, $entrepprise, $specificites...)

        //TEST POUR SVG -------------------


        $repository = $this->getDoctrine()->getRepository(Design::class);
        $svgTopW = $repository->findOneBy(
            array('nom'=>'top-trs-w', 'categorie' => 'test')
        );

        $repository = $this->getDoctrine()->getRepository(Design::class);
        $svgTopC = $repository->findOneBy(
            array('nom'=>'top-trs-c', 'categorie' => 'fleur')
        );

        $repository = $this->getDoctrine()->getRepository(Design::class);
        $svgBottomW = $repository->findOneBy(
            array('nom'=>'bottom-trs-w', 'categorie' => 'fleur')
        );

        $repository = $this->getDoctrine()->getRepository(Design::class);
        $svgBottomC = $repository->findOneBy(
            array('nom'=>'bottom-trs-c', 'categorie' => 'fleur')
        );

        $repository = $this->getDoctrine()->getRepository(Design::class);
        $svgStiW = $repository->findOneBy(
            array('nom'=>'soustitre-icon-w', 'categorie' => 'fleur')
        );

        $repository = $this->getDoctrine()->getRepository(Design::class);
        $svgStiC = $repository->findOneBy(
            array('nom'=>'soustitre-icon-c', 'categorie' => 'fleur')
        );



        //---------------------


        $repository = $this->getDoctrine()->getRepository(Partenaires::class);
        $logos = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

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

        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        //pour l'historique on sélectionne seulement dans la table contenu les lignes qui ont pour section le terme "historique"
        $historiques = $repository->findAll(array('dateAffichage' => 'DESC'));

        // -----------------------------------------------------------------------------------

        //On crée l'objet $form en allant chercher le formulaire créé dans ContactType
        $form = $this->createForm(ContactType::class, null);
        //handlrequest permet de récupérer/traiter les infos envoyée dans un formulaire (comme le $_POST)
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            // permet de récupérer toutes les infos du formulaire (fonction native à Symfony)
            // prenom = $data['prenom']
            // objet = $data['objet']

            if ($this->sendEmail($data, $mailer)) {
                // $mailer : objet swiftmailer que l'on retrouve dans la fonction suivante pour l'envoi du mail
                $this->addFlash('success', 'Votre email a été envoyé et sera traité dans les meilleurs délais.');
                //si l'email est bien envoyé on a un message de confirmation et on est redirigé vers l'index
                return $this->redirectToRoute("index");
            } else {
                //s'il y a une erreur, un message d'erreur apparaît et on n'envoie pas l'email tant que ça n'est pas corrigé
                $this->addFlash('errors', 'Un problème a eu lieu durant l\'envoi, veuillez ré-essayer plus tard');
            }
        }


        // ----------------------------------------------------------------------------------
        //on injecte les données dans la vue index
        return $this->render('base/index.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'historiques' => $historiques,
            'logos' => $logos,
            'couleurs' => $couleurs,
            'horaires' => $horaires,
            'form' => $form->createView(),
            'svgTopW' => $svgTopW,
            'svgTopC' => $svgTopC,
            'svgBottomW' => $svgBottomW,
            'svgBottomC' => $svgBottomC,
            'svgStiW' => $svgStiW,
            'svgStiC' => $svgStiC,
        ]);
    }

    /**
     * affiche la galerie de photos (en dynamique)
     * @Route("/realisations", name="realisations")
     */
    public function realisations()
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

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

        // -----------------------------------------------------------------------------------

        //on utilise le repository pour accéder à la table Galerie
        $repository = $this->getDoctrine()->getRepository(Galerie::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $galeries = $repository->findAll();

        // $galeries = $repository->findAll(array('id' => 'DESC'));

        // -----------------------------------------------------------------------------------

        //on injecte les données dans la vue réalisations (en incluant les données pour le footer)
        return $this->render('base/realisations.html.twig', [
            'galeries' => $galeries,
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'couleurs' => $couleurs,
            'horaires' => $horaires,
        ]);
    }


    /**
     * affiche les tarifs
     * @Route("/tarifs", name="tarifs")
     */
    public function tarifs()
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

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
        // -----------------------------------------------------------------------------------

        //on utilise le repository pour accéder à la table Tarifs
        $repository = $this->getDoctrine()->getRepository(Tarifs::class);
        //On récupère toutes les données de la table Tarifs et on les injecte dans l'objet $tarifs
        $tarifs = $repository->findAll();

        // -----------------------------------------------------------------------------------

        //on injecte les données dans la vue mentions (en incluant les données pour le footer)

        return $this->render('base/tarifs.html.twig', [
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'entreprise' => $entreprise,
            'tarifs' => $tarifs,
            'couleurs' => $couleurs,
            'horaires' => $horaires,
        ]);
    }



    /**
     * affiche les mentions légales (statique)
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentions()
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //Cette vue ne nous demande pour le moment aucune fonction, c'est une vue statique (à part le footer et la nav)

        // -----------------------------------------------------------------------------------

        //on injecte les données dans la vue mentions (pour le moment seulement les données pour le footer)

        return $this->render('base/mentions.html.twig', [
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'entreprise' => $entreprise,
            'couleurs' => $couleurs,
            'horaires' => $horaires
        ]);
    }

    /**
     * affiche les CGU (statique)
     * @Route("/CGU", name="CGU")
     */
    public function CGU()
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //Cette vue ne nous demande pour le moment aucune fonction, c'est une vue statique (à part le footer et la nav)

        // -----------------------------------------------------------------------------------

        //on injecte les données dans la vue cgu (pour le moment seulement les données pour le footer)

        return $this->render('base/cgu.html.twig', [
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'entreprise' => $entreprise,
            'horaires' => $horaires,
            'couleurs' => $couleurs
        ]);
    }


    /**
     * affiche le formulaire de contact pour envoyer un mail directement par le site
     * @Route("/contact", name="contact")
     */
    public function Formulaire(Request $request, \Swift_Mailer $mailer)
    {
        // Pour que le footer reçoive bien les données dont il a besoin, il faut aller chercher les données dans les tables Specificites et Entreprise

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Localisation::class);
        $localisations = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);


        $repository = $this->getDoctrine()->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(
            array('dateAffichage' => 'DESC')
        );

        // -----------------------------------------------------------------------------------

        //On crée l'objet $form en allant chercher le formulaire créé dans ContactType
        $form = $this->createForm(ContactType::class, null);
        //handlrequest permet de récupérer/traiter les infos envoyée dans un formulaire (comme le $_POST)
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            // permet de récupérer toutes les infos du formulaire (fonction native à Symfony)
            // prenom = $data['prenom']
            // objet = $data['objet']

            if ($this->sendEmail($data, $mailer)) {
                // $mailer : objet swiftmailer que l'on retrouve dans la fonction suivante pour l'envoi du mail
                $this->addFlash('success', 'Votre email a été envoyé et sera traité dans les meilleurs délais.');
                //si l'email est bien envoyé on a un message de confirmation et on est redirigé vers l'index
                return $this->redirectToRoute("index");
            } else {
                //s'il y a une erreur, un message d'erreur apparaît et on n'envoie pas l'email tant que ça n'est pas corrigé
                $this->addFlash('errors', 'Un problème a eu lieu durant l\'envoi, veuillez ré-essayer plus tard');
            }
        }

        // -----------------------------------------------------------------------------------
        //on injecte les données dans la vue contact (en incluant le footer)
        //Ne pas oublier de créer la vue du formulaire avec la ligne 'form' => $form->createView(),
        return $this->render('base/contact.html.twig', [
            'form' => $form->createView(),
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'entreprise' => $entreprise,
            'horaires' => $horaires,
            'couleurs' => $couleurs
        ]);
    }


    /**
     * Permet d'envoyer des emails, fonction sans route
     *
     */
    public function sendEmail($data, \Swift_Mailer $mailer)
    {
        $mail = new \Swift_Message();
        // On instancie un objet swiftmailer en précisant l'objet (sujet) du mail.

        $mail
            //on envoie toutes les données récupérées dans le formulaire envoyé et on les injecte dans l'objet $mail
            ->setSubject($data['objet'])
            ->setFrom($data['email'])
            ->setTo('test.mbmp@gmail.com') //mettre l'adresse du destinataire
            ->setBody(
                //on envoie les données dans une vue "emails/contact" créée spécialement pour paramétrer les mails envoyé par le formulaire, c'est une vue qui n'apparaît pas sur le site.
                $this->renderView('emails/contact.html.twig', [
                    'data' => $data
                ]),
                'text/html'
            );

        //si l'email est bien envoyé, message de confirmation, sinon message d'erreur
        if ($mailer->send($mail)) {
            return true;
        } else {
            return false;
        }
    }
}
