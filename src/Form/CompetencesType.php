<?php

namespace App\Form;

use App\Entity\Competences;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompetencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            // Required permet de préciser si le contenu est obligatoire (true) ou non (false)


            ->add('competence', TextType::class,array('required' => true))


            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
