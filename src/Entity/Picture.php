<?php

namespace App\Entity;

use Serializable;
use Symfony\Component\Serializer\Serializer;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 * @Vich\Uploadable()
 */
class Picture implements \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var File|null
     * @Assert\Image(
     *     mimeTypes="image/jpeg"
     * )
     * @Vich\UploadableField(mapping="galerie_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Galerie", inversedBy="photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $galerie;



    public function getId(): ?int
    {
        return $this->id;
    }


    public function getGalerie(): ?Galerie
    {
        return $this->galerie;
    }

    public function setGalerie(?Galerie $galerie): self
    {
        $this->galerie = $galerie;

        return $this;
    }

    /**
     * @return null|File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param null|File $imageFile
     * @return self
     */
    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;
        return $this;
    }



    //------------------------------------- FONCTION POUR LA PHOTO -------------------------

    public function setFilename(UploadedFile $filename): self
    {
        $this->filename = $filename;
        return $this;
    }

    public function getFilename()
    {
        return $this->filename;
    }


    //2 objectifs :
    // permettre l'enregistrement de la photo dans la BDD (après qu'elle soit renommée)
    // Enregistrer la photo sur le serveur /public/photo

    public function uploadFile()
    {
        // On récupère le nom de la photo
        $nom = $this->filename->getClientOriginalName(); //$_FILE['file']['name']
        $new_nom = $this->renamePhoto($nom);
        $this->imageFile = $new_nom; // /!\ sera enregistré en BDD

        //-----
        $this->filename->move($this->dirPhoto(), $new_nom);
        // déplace la photo depuis son emplacement temporaire jusqu'à son emplacement définitif (chemin + nom)
    }

    // renomme la photo de manière unique
    public function renamePhoto($name)
    {
        return 'photo_' . time() . '_' . rand(1, 99999) . '_' . $name;
        //photo_1550000000_87534_nom.jpg
    }

    // Nous retourne le chemin du dossier photo
    public function dirPhoto()
    {
        return __DIR__ . '/../../public/photo/';
    }

    // Supprimer un fichier photo
    public function removePhoto()
    {
        $filename = $this->dirPhoto() . $this->getImageFile();
        if (file_exists($filename) && $this->getImageFile() != 'default.jpg') {
            unlink($filename);
        }
    }
    //------------------------------------- /FONCTION POUR LA PHOTO ------------------------------------------------


    public function serialize()
    { }
    public function unserialize($arg)
    { }
}
