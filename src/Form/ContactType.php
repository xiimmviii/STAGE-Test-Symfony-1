<?php

namespace App\Form;

use App\Entity\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            ->add('prenom', TextType::class, [
                // Constraints permet ici de limiter la longueur minimale et maximale de ce qui peut être envoyé
                'constraints' => new Length(['min' => 3, 'max' => 35])
            ]
            )
            ->add('nom', TextType::class,
            [
                'constraints' => new Length(['min' => 3, 'max' => 35])
            ])
            ->add('societe', TextType::class,
            [
                'constraints' => new Length(['min' => 3, 'max' => 35]),
                // Required permet de préciser si le contenu est obligatoire (true) ou non (false)
                'required' => false
            ])
            ->add('email',EmailType::class,array(
                // Ici, le constraint va permettre d'appliquer les pré-requis d'un champ mail
                // Il faut absolument un @ et une extension à la suite pour pouvoir envoyer le formulaire
                // Si ce qui est entré dans le champ ne correspond pas, on affiche un message d'erreur 
                'constraints' => array(
                    new Assert\Email(array(
                        'message' => '{{ value }} n\'est pas un email valide'
                    ))
                )
            ))
            ->add('telephone', TextType::class,array('required' => false))
            ->add('objet', TextType::class,
            [
                'constraints' => new Length(['min' => 10])
            ])
            ->add('message', TextareaType::class,
            [
                'constraints' => new Length(['min' => 25,])
            ])
            ->add('idMail', TextType::class, [
                // Constraints permet ici de limiter la longueur minimale et maximale de ce qui peut être envoyé
                'constraints' => new Length(['min' => 2, 'max' => 35])
            ]
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
