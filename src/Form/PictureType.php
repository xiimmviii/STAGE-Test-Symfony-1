<?php

namespace App\Form;

use App\Entity\Galerie;
use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class PictureType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			// On construit le formulaire en déclinant les champs 
			// On déclare le champ, on lui applique une classe qui définit son type
			// On peut ensuite ajouter des spécificités à ces champs 

			->add('filename', FileType::class, array(
				'constraints' => array(
					// On définit les formats d'image qui peuvent être envoyés 
					new Assert\Image(array(
						'mimeTypes' => array(
							'image/jpeg',
							'image/jpg',
						),
						'mimeTypesMessage' => 'Veuillez sélectionner une image JPG ou JPEG',
					)),
					new Assert\File(array(
						// On définit la taille maximale du fichier qui peut être envoyé 
						'maxSize' => '3M',
						'maxSizeMessage' => '>Veuillez sélectionner une image de 3Mo maximum'
					)),
				),
				'label' => 'Photo'
			))

			// ->add('galerie', TextType::class,array('required' => true))

			->add('galerie', EntityType::class, [
				'class' => Galerie::class,
				'choice_value' => function (Galerie $Galerie = null) {
					return $Galerie ? $Galerie->getId() : '';
				},
			])


			->add('submit', SubmitType::class);;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Picture::class,
		]);
	}
}