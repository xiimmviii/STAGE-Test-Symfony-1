<?php

namespace App\Notification;

use Twig\Environment;
use App\Entity\Contact;



class ContactNotification{

    /**
     *
     * @var \Swift_Mailer
    */
   private $mailer;

    /**
    * @var Environment
    */
   private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {

        // On créé des variables pour pouvoir générer l'envoi du message via SwiftMailer
        $this->mailer = $mailer;
        $this->renderer = $renderer;
       
    }

    public function notify(Contact $contact)
    { 
        // On récupère les informations qui proviennent du formulaire de contact via le CONTACTTYPE.PHP et le controller BASE 
        $message = (new \Swift_Message('Contact'))
            ->setFrom($contact->getEmail())
            ->setTo($contact->getEmail())
            ->setReplyTo($contact->getEmail())
            ->setBody($this->renderer->render('emails/contact.html.twig', [
                'contact' => $contact
            ]), 'text/html');

            return $this->mailer->send($message);
    }

}