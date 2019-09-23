<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Symfony\Component\Serializer\Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GalerieRepository")
 */
class Galerie implements \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo = 'default.jpg'; 

    private $file;
    // On ne mappe pas cette propriété car elle n'existe pas dans la BDD. Elle va juste servir à récupérer les octets qui constituent l'image.

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

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
    
    
        public function serialize(){}
        public function unserialize($arg){}
    
}
