<?php

namespace App\Form;

use App\Entity\Design;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DesignType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            ->add('categorie', TextType::class, array('required' => true))
            ->add('bottom_trs_w', TextType::class, array('required' => false))
            ->add('bottom_trs_c', TextType::class, array('required' => false))
            ->add('top_trs_w', TextType::class, array('required' => false))
            ->add('top_trs_c', TextType::class, array('required' => false))
            ->add('soustitre_icon_w', TextType::class, array('required' => false))
            ->add('soustitre_icon_c', TextType::class, array('required' => false))



            ->add('dateAffichage', TextType::class,array('required' => false))
        
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Design::class,
        ]);
    }
}
