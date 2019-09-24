<?php

namespace App\Form;

use App\Entity\Entreprise;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('statut_rcs', TextType::class)
            ->add('adresse', TextType::class)
            ->add('cp', IntegerType::class)
            ->add('ville', TextType::class)
            ->add('telephone', TextType::class)
            ->add('mailGerant',EmailType::class,array(
                'constraints' => array(
                    new Assert\Email(array(
                        'message' => '{{ value }} n\'est pas un email valide'
                    ))
                )
            ))
            ->add('mailContact',EmailType::class,array(
                'constraints' => array(
                    new Assert\Email(array(
                        'message' => '{{ value }} n\'est pas un email valide'
                    ))
                )
            ))
            ->add('siren', IntegerType::class)
            ->add('siret', IntegerType::class)
            ->add('activite', TextType::class)
            ->add('nomGerant', TextType::class)
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
