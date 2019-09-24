<?php

namespace App\Form;

use App\Entity\Partenaires;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert; 


class PartenairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, array(
				'constraints' => array(
					new Assert\Image(array(
						'mimeTypes' => array(
							'image/png',
							'image/jpeg',
							'image/jpg',
							'image/gif'
						),
						'mimeTypesMessage' => 'Veuillez sélectionner une image PNG, JPG, JPEG ou GIF' ,
					)),
					new Assert\File(array(
						'maxSize' => '3M',
						'maxSizeMessage' => '>Veuillez sélectionner une image de 3Mo maximum'
					)),
				), 
				'label' => 'Photo'
			))

			
			->add('nomPartenaire', TextType::class)
			->add('sitePartenaire', TextType::class)
			->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
