<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Galerie;
use App\Form\ContactType;
use App\Entity\Entreprise;
use App\Entity\Partenaires;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Partenaires::class);
        $logos = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);


        return $this->render('base/index.html.twig', [
            'entreprise' => $entreprise,
            'logos' => $logos
        ]);


        
    }

    /**
     * @Route("/realisations", name="realisations")
     */
    public function realisations()
    {

        $repository = $this->getDoctrine()->getRepository(Galerie::class);
        $photos = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        return $this->render('base/realisations.html.twig', [
            'photos' => $photos,
            'entreprise' => $entreprise
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        return $this->render('base/contact.html.twig', [
            'controller_name' => 'BaseController',
            'entreprise' => $entreprise
        ]);
    }


    /**
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentions()
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        return $this->render('base/mentions.html.twig', [
            'controller_name' => 'BaseController',
            'entreprise' => $entreprise
        ]);
    }

    /**
     * @Route("/CGU", name="CGU")
     */
    public function CGU()
    {
        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        return $this->render('base/CGU.html.twig', [
            'controller_name' => 'BaseController',
            'entreprise' => $entreprise
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function Formulaire(Request $request, \Swift_Mailer $mailer)
    {

        $repository = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repository->findOneById(1);

        $form = $this->createForm(ContactType::class, null);
        $form->handleRequest($request);

        // traitement des infos du formulaire

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            // permet de récupérer toutes les infos du formulaire
            // prenom = $data['prenom']
            // objet = $data['objet']

            if ($this->sendEmail($data, $mailer)) {
                // $mailer : objet swiftmailer
                $this->addFlash('success', 'Votre email a été envoyé et sera traité dans les meilleurs délais.');
                return $this->redirectToRoute("index");
            } else {
                $this->addFlash('errors', 'Un problème a eu lieu durant l\'envoi, veuillez ré-essayer plus tard');
            }
        }

        return $this->render('base/contact.html.twig', [
            'form' => $form->createView(),
            'entreprise' => $entreprise
        ]);
    }


    /**
     * Permet d'envoyer des emails
     *
     */
    public function sendEmail($data, \Swift_Mailer $mailer)
    {
        $mail = new \Swift_Message();
        // On instancie un objet swiftmailer en précisant l'objet (sujet) du mail.

        $mail
            ->setSubject($data['objet'])
            ->setFrom($data['email'])
            ->setTo('test.mbmp@gmail.com')
            ->setBody(
                $this->renderView('emails/contact.html.twig', [
                    'data' => $data
                ]),
                'text/html'
            );

        if ($mailer->send($mail)) {
            return true;
        } else {
            return false;
        }
    }
}
