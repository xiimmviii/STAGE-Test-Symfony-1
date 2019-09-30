<?php

namespace App\Form;

use App\Entity\Tarifs;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TarifsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            ->add('prestation', TextType::class,array('required' => true))
            // Required permet de préciser si le contenu est obligatoire (true) ou non (false)
            ->add('tarif journée', NumberType::class,array('required' => true))
            ->add('tarif nuit', NumberType::class,array('required' => false))
            ->add('tarif weekend', NumberType::class,array('required' => false))

            
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
