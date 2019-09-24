<?php

namespace App\Form;

use App\Entity\Specificites;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SpecificitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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

            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
