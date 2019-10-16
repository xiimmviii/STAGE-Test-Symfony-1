<?php

namespace App\Form;

use App\Entity\Icons;


use App\Entity\Labels;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class LabelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            ->add('nom', TextType::class,array('required' => true))
            // Required permet de préciser si le contenu est obligatoire (true) ou non (false)



        //     ->add('nom', EntityType::class, array(
        //         "class" => "App\Entity\Icons"
        // ))
            // ->add('svg_nom', IconsType::class, array()
            //  [
            //     'choices'  => [
            //         'Test 1' => 'Test 1',
            //         'Test 2' => 'test 2',
            //     ],
            //     ])



            ->add('svg_nom', EntityType::class, [
                'class' => Icons::class,
                // 'choices' => svg_nom,
                'choice_label' => function ($icons) {
                    return $icons->getNom();
                }
            ])
            
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Labels::class,
        ]);
    }
}
