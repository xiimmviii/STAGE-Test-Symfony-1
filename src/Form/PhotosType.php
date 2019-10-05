<?php

namespace App\Form;

use App\Entity\Photos;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PhotosType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			// On construit le formulaire en déclinant les champs 
			// On déclare le champ, on lui applique une classe qui définit son type
			// On peut ensuite ajouter des spécificités à ces champs 

			->add('nomGalerie', TextType::class)
			->add('descriptionGalerie', CKEditorType::class)
			->add('file', FileType::class, array(
				'constraints' => array(
					// On définit les formats d'image qui peuvent être envoyés 
					new Assert\Image(array(
						'mimeTypes' => array(
							'image/png',
							'image/jpeg',
							'image/jpg',
							'image/gif'
						),
						'mimeTypesMessage' => 'Veuillez sélectionner une image PNG, JPG, JPEG ou GIF',
					)),
					new Assert\File(array(
						// On définit la taille maximale du fichier qui peut être envoyé 
						'maxSize' => '3M',
						'maxSizeMessage' => '>Veuillez sélectionner une image de 3Mo maximum'
					)),
				),
				'label' => 'Photo'
			))
			->add('dateAffichage', TextType::class, array('required' => false))

			->add('submit', SubmitType::class);;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Photos::class,
		]);
	}
}
