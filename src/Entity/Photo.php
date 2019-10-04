<?php

namespace App\Entity;

use Serializable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo implements \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo = 'default.jpg';

    /**
     * 
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    private $file;
    // On ne mappe pas cette propriété car elle n'existe pas dans la BDD. Elle va juste servir à récupérer les octets qui constituent l'image. 


    /**
     * C'est grâce à ce code que l'on fait le lien entre cette table et la table "galerie"
     * Chaque photo appartient à une et une seule galerie
     * 
     * 
     * @ORM\ManyToOne(targetEntity="Galerie", inversedBy="photos")
     * @ORM\JoinColumn(name="galerie", referencedColumnName="id")
     *                 clé étrangère         clé primaire
     * 
     */
     private $galerie; 

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $dateAffichage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

   public function getGalerie()
    {
        return $this->galerie;
    }

    public function setGalerie($galerie): self
    {
        $this->galerie = $galerie;

        return $this;
    }
    

    public function getDateAffichage(): ?string
    {
        return $this->dateAffichage;
    }

    public function setDateAffichage(string $dateAffichage): self
    {
        $this->dateAffichage = $dateAffichage;

        return $this;
    }


    /**
   * Getter for Description
   *
   * @return [type]
   */
  public function getDescription()
  {
      return $this->description;
  }

  /**
   * Setter for Descrption
   * @var [type] description
   *
   * @return self
   */
  public function setDescription($description)
  {
      $this->message = $description;
      return $this;
  }


    //------------------------------------- FONCTION POUR LA PHOTO -------------------------

    public function setFile(UploadedFile $file): self
    {
        $this->file = $file;
        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }


    //2 objectifs :
    // permettre l'enregistrement de la photo dans la BDD (après qu'elle soit renommée)
    // Enregistrer la photo sur le serveur /public/photo

    public function uploadFile()
    {
        // On récupère le nom de la photo
        $nom = $this->file->getClientOriginalName(); //$_FILE['file']['name']
        $new_nom = $this->renamePhoto($nom);
        $this->photo = $new_nom; // /!\ sera enregistré en BDD

        //-----
        $this->file->move($this->dirPhoto(), $new_nom);
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
        $file = $this->dirPhoto() . $this->getPhoto();
        if (file_exists($file) && $this->getPhoto() != 'default.jpg') {
            unlink($file);
        }
    }
    //------------------------------------- /FONCTION POUR LA PHOTO ------------------------------------------------


    public function serialize()
    { }
    public function unserialize($arg)
    { }

}
