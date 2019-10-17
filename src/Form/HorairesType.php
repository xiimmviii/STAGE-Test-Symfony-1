<?php 

namespace App\Form;

use App\Entity\Horaires;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HorairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 
            ->add('Jour', TextType::class,array('required' => true))
            // Required permet de préciser si le contenu est obligatoire (true) ou non (false)
            
            ->add('Ouverture', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => true
            ])
            ->add('Fermeture', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => true
            ])
            ->add('Debut_Pause', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => false
            ])
            ->add('Fin_Pause', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => false
            ])
            
            
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}