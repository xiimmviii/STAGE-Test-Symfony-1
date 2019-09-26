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
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            ->add('nom', TextType::class)
            // Required permet de préciser si le contenu est obligatoire (true) ou non (false)
            ->add('statut_rcs', TextType::class,array('required' => false))
            ->add('adresse', TextType::class)
            ->add('cp', IntegerType::class)
            ->add('ville', TextType::class)
            ->add('telephone', TextType::class)
            ->add('mailGerant',EmailType::class,array(
                // Ici, le constraint va permettre d'appliquer les pré-requis d'un champ mail
                // Il faut absolument un @ et une extension à la suite pour pouvoir envoyer le formulaire
                // Si ce qui est entré dans le champ ne correspond pas, on affiche un message d'erreur
                'constraints' => array(
                    new Assert\Email(array(
                        'message' => '{{ value }} n\'est pas un email valide'
                    )),
                )
                )
                )
            ->add('mailContact',EmailType::class,array(
                'constraints' => array(
                    new Assert\Email(array(
                        'message' => '{{ value }} n\'est pas un email valide'
                    ))
                )
            ))
            ->add('siren', IntegerType::class,array('required' => false))
            ->add('siret', IntegerType::class,array('required' => false))
            ->add('activite', TextType::class)
            ->add('nomGerant', TextType::class,array('required' => false))
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
