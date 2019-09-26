<?php

namespace App\Form;

use App\Entity\Specificites;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SpecificitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            // Required permet de préciser si le contenu est obligatoire (true) ou non (false)

            ->add('facebook', TextType::class,array('required' => false))
            ->add('instagram', TextType::class,array('required' => false))
            ->add('pageGoogle', TextType::class)

            ->add('localisation1', TextType::class,array('required' => false))
            ->add('localisation2', TextType::class,array('required' => false))
            ->add('localisation3', TextType::class,array('required' => false))
            ->add('localisation4', TextType::class,array('required' => false))
            ->add('localisation5', TextType::class,array('required' => false))
            ->add('localisation6', TextType::class,array('required' => false))
            ->add('localisation7', TextType::class,array('required' => false))
            ->add('localisation8', TextType::class,array('required' => false))
            ->add('localisation9', TextType::class,array('required' => false))
            ->add('localisation10', TextType::class,array('required' => false))

            ->add('competence1', TextType::class,array('required' => false))
            ->add('competence2', TextType::class,array('required' => false))
            ->add('competence3', TextType::class,array('required' => false))
            ->add('competence4', TextType::class,array('required' => false))
            ->add('competence5', TextType::class,array('required' => false))
            ->add('competence6', TextType::class,array('required' => false))
            ->add('competence7', TextType::class,array('required' => false))
            ->add('competence8', TextType::class,array('required' => false))
            ->add('competence9', TextType::class,array('required' => false))
            ->add('competence10', TextType::class,array('required' => false))

            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
