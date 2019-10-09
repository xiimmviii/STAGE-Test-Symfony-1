<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
        // On construit le formulaire en déclinant les champs 
        // On déclare le champ, on lui applique une classe qui définit son type
        // On peut ensuite ajouter des spécificités à ces champs 

            ->add('imagefile', FileType::class, array(
				'constraints' => array(
					// On définit les formats d'image qui peuvent être envoyés 
					new Assert\Image(array(
						'mimeTypes' => array(
							'image/jpeg',
							'image/jpg',
						),
						'mimeTypesMessage' => 'Veuillez sélectionner une image JPG ou JPEG' ,
					)),
					new Assert\File(array(
						// On définit la taille maximale du fichier qui peut être envoyé 
						'maxSize' => '3M',
						'maxSizeMessage' => '>Veuillez sélectionner une image de 3Mo maximum'
					)),
				), 
				'label' => 'Photo'
			))

            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}

