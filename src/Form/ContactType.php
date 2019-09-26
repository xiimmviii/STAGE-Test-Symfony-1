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
            ->add('prenom', TextType::class, [
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
                'required' => false
            ])
            ->add('email',EmailType::class,array(
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

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
