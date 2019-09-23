<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    /**
     * @Route("/realisations", name="realisations")
     */
    public function realisations()
    {
        return $this->render('base/realisations.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

        /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('base/contact.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }


    /**
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentions()
    {
        return $this->render('base/mentions.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    /**
     * @Route("/CGU", name="CGU")
     */
    public function CGU()
    {
        return $this->render('base/CGU.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

 /**
     * @Route("/contact", name="contact")
     */


    public function Formulaire(Request $request, \Swift_Mailer $mailer)
    {

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
