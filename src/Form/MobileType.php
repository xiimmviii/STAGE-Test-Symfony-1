<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class MobileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 

            ->add('contenu', CKEditorType::class, [
                'constraints' => new Length(['min' => 5, 'max' => 500]),
            ])
            ->add('dateAffichage', TextType::class,array('required' => false))
        
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
