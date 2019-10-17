<?php

namespace App\Controller;

use App\Entity\Icons;
use App\Entity\Design;
use App\Entity\Mobile;
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
     * Page d'index, affiche les sections
     * @Route("/", name="index")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {

        // Récupération des données nécessaires à l'affichage de cette page


        $repository = $this->getDoctrine()->getRepository(Design::class);
        $svgTransis = $repository->findAll(array('dateAffichage' => 'DESC'));

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

        $repository = $this->getDoctrine()->getRepository(Icons::class);
        $icons = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Reseaux::class);
        $reseaux = $repository->findOneById(1);

        $repository = $this->getDoctrine()->getRepository(Couleur::class);
        $couleurs = $repository->findAll(array('dateAffichage' => 'DESC'));

        $repository = $this->getDoctrine()->getRepository(Mobile::class);
        $mobiles = $repository->findAll(array('dateAffichage' => 'DESC'));

        $repository = $this->getDoctrine()->getRepository(Contenu::class);
        $historiques = $repository->findAll(array('dateAffichage' => 'DESC'));

// -----------------------------------------------------------------------------------

        // On génère le formulaire de contact de la page Accueil 
        //On crée l'objet $form en allant chercher le formulaire créé dans ContactType
        $form = $this->createForm(ContactType::class, null);
        //handlerequest permet de récupérer/traiter les infos envoyée dans un formulaire (comme le $_POST)
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            // Permet de récupérer toutes les infos du formulaire (fonction native à Symfony)
            // prenom = $data['prenom']
            // objet = $data['objet']

            if ($this->sendEmail($data, $mailer)) {
                // $mailer : objet swiftmailer que l'on retrouve dans la fonction suivante pour l'envoi du mail
                $this->addFlash('success', 'Votre email a été envoyé et sera traité dans les meilleurs délais.');
                //Si l'email est bien envoyé on a un message de confirmation et on est redirigé vers l'index
                return $this->redirectToRoute("index");
            } else {
                //S'il y a une erreur, un message d'erreur apparaît et on n'envoie pas l'email tant que ça n'est pas corrigé
                $this->addFlash('errors', 'Un problème a eu lieu durant l\'envoi, veuillez ré-essayer plus tard');
            }
        }

 // ----------------------------------------------------------------------------------
  
        // On injecte les données dans la vue index
        return $this->render('base/index.html.twig', [
            'entreprise' => $entreprise,
            'localisations' => $localisations,
            'competences' => $competences,
            'reseaux' => $reseaux,
            'historiques' => $historiques,
            'mobiles' => $mobiles,
            'logos' => $logos,
            'couleurs' => $couleurs,
            'horaires' => $horaires,
            'form' => $form->createView(),
            'svgTransis' => $svgTransis,
            'icons' => $icons,

        ]);
    }

    /**
     * Affiche la galerie de photos (en dynamique)
     * @Route("/realisations", name="realisations")
     */
    public function realisations()
    {

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
        $couleurs = $repository->findAll(array('dateAffichage' => 'DESC'));

// -----------------------------------------------------------------------------------

        // On utilise le repository pour accéder à la table Galerie
        $repository = $this->getDoctrine()->getRepository(Galerie::class);
        //On récupère toutes les données de la table Galerie et on les injecte dans l'objet $photos
        $galeries = $repository->findAll();


// -----------------------------------------------------------------------------------

        // On injecte les données dans la vue réalisations (en incluant les données pour le footer)
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
     * Affiche les tarifs
     * @Route("/tarifs", name="tarifs")
     */
    public function tarifs()
    {

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
        $couleurs = $repository->findAll(array('dateAffichage' => 'DESC'));
        
// -----------------------------------------------------------------------------------

        // On utilise le repository pour accéder à la table Tarifs
        $repository = $this->getDoctrine()->getRepository(Tarifs::class);
        //On récupère toutes les données de la table Tarifs et on les injecte dans l'objet $tarifs
        $tarifs = $repository->findAll();

// -----------------------------------------------------------------------------------

        // On injecte les données dans la vue mentions (en incluant les données pour le footer)

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
     * Affiche les mentions légales (statique)
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentions()
    {

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
        $couleurs = $repository->findAll(array('dateAffichage' => 'DESC'));

// -----------------------------------------------------------------------------------

        // Cette vue ne nous demande pour le moment aucune fonction
        // C'est une vue statique (à part le footer et la nav)

 // -----------------------------------------------------------------------------------

        // On injecte les données dans la vue mentions (pour le moment seulement les données pour le footer)

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
     * Affiche les CGU (statique)
     * @Route("/CGU", name="CGU")
     */
    public function CGU()
    {

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

        //Cette vue ne nous demande pour le moment aucune fonction
        // C'est une vue statique (à part le footer et la nav)

// -----------------------------------------------------------------------------------

        // On injecte les données dans la vue cCGU (pour le moment seulement les données pour le footer)

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
     * Affiche le formulaire de contact pour envoyer un mail directement par le site
     * @Route("/contact", name="contact")
     */
    public function Formulaire(Request $request, \Swift_Mailer $mailer)
    {

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
        $couleurs = $repository->findAll(array('dateAffichage' => 'DESC'));

// -----------------------------------------------------------------------------------

        // On crée l'objet $form en allant chercher le formulaire créé dans ContactType
        $form = $this->createForm(ContactType::class, null);
        // Handlrequest permet de récupérer/traiter les infos envoyée dans un formulaire (comme le $_POST)
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            // Permet de récupérer toutes les infos du formulaire (fonction native à Symfony)
            // prenom = $data['prenom']
            // objet = $data['objet']

            if ($this->sendEmail($data, $mailer)) {
                // $mailer : objet swiftmailer que l'on retrouve dans la fonction suivante pour l'envoi du mail
                $this->addFlash('success', 'Votre email a été envoyé et sera traité dans les meilleurs délais.');
                //si l'email est bien envoyé on a un message de confirmation et on est redirigé vers l'index
                return $this->redirectToRoute("index");
            } else {
                // S'il y a une erreur, un message d'erreur apparaît et on n'envoie pas l'email tant que ça n'est pas corrigé
                $this->addFlash('errors', 'Un problème a eu lieu durant l\'envoi, veuillez ré-essayer plus tard');
            }
        }

// -----------------------------------------------------------------------------------

        // On injecte les données dans la vue contact (en incluant le footer)
        // Ne pas oublier de créer la vue du formulaire avec la ligne 'form' => $form->createView()

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
        // On envoie toutes les données récupérées dans le formulaire envoyé et on les injecte dans l'objet $mail
            ->setSubject($data['objet'])
            ->setFrom($data['email'])
            ->setTo('test.mbmp@gmail.com') // Mettre l'adresse du destinataire
            ->setBody(
        // On envoie les données dans une vue "emails/contact" créée spécialement pour paramétrer les mails envoyés par le formulaire
        // C'est une vue qui n'apparaît pas sur le site
                $this->renderView('emails/contact.html.twig', [
                    'data' => $data
                ]),
                'text/html'
            );

        // Si l'email est bien envoyé, on a un message de confirmation, sinon un message d'erreur
        if ($mailer->send($mail)) {
            return true;
        } else {
            return false;
        }
    }
}
