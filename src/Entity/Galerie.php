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
     * @ORM\Column(type="string", length=255)
     */
    private $nomGalerie;

    private $file1;
    // On ne mappe pas cette propriété car elle n'existe pas dans la BDD. Elle va juste servir à récupérer les octets qui constituent l'image.

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $photo1 = 'default.jpg';

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description1;

    private $file2;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo2 = 'default.jpg';

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description2;

    private $file3;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo3 = 'default.jpg';

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description3;


    private $file4;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo4 = 'default.jpg';

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description4;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGalerie(): ?string
    {
        return $this->nomGalerie;
    }

    public function setNomGalerie(string $nomGalerie): self
    {
        $this->nomGalerie = $nomGalerie;

        return $this;
    }

    public function getPhoto1(): ?string
    {
        return $this->photo1;
    }

    public function setPhoto1(string $photo1): self
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(?string $description1): self
    {
        $this->description1 = $description1;

        return $this;
    }

    public function getPhoto2(): ?string
    {
        return $this->photo2;
    }

    public function setPhoto2(?string $photo2): self
    {
        $this->photo2 = $photo2;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getPhoto3(): ?string
    {
        return $this->photo3;
    }

    public function setPhoto3(?string $photo3): self
    {
        $this->photo3 = $photo3;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(?string $description3): self
    {
        $this->description3 = $description3;

        return $this;
    }

    public function getPhoto4(): ?string
    {
        return $this->photo4;
    }

    public function setPhoto4(?string $photo4): self
    {
        $this->photo4 = $photo4;

        return $this;
    }

    public function getDescription4(): ?string
    {
        return $this->description4;
    }

    public function setDescription4(?string $description4): self
    {
        $this->description4 = $description4;

        return $this;
    }



    //------------------------------------- FONCTION POUR LA PHOTO -------------------------

    public function setFile1(UploadedFile $file1): self
    {
        $this->file1 = $file1;
        return $this;
    }

    public function getFile1()
    {
        return $this->file1;
    }

    public function setFile2(UploadedFile $file2): self
    {
        $this->file2 = $file2;
        return $this;
    }

    public function getFile2()
    {
        return $this->file2;
    }

    public function setFile3(UploadedFile $file3): self
    {
        $this->file3 = $file3;
        return $this;
    }

    public function getFile3()
    {
        return $this->file3;
    }

    public function setFile4(UploadedFile $file4): self
    {
        $this->file4 = $file4;
        return $this;
    }

    public function getFile4()
    {
        return $this->file4;
    }


    //2 objectifs :
    // permettre l'enregistrement de la photo dans la BDD (après qu'elle soit renommée)
    // Enregistrer la photo sur le serveur /public/photo

    public function uploadFile1()
    {
        // On récupère le nom de la photo
        $nom1 = $this->file1->getClientOriginalName(); //$_FILE['file']['name']
        $new_nom1 = $this->renamePhoto($nom1);
        $this->photo1 = $new_nom1; // /!\ sera enregistré en BDD

        //-----
        $this->file1->move($this->dirPhoto(), $new_nom1);
        // déplace la photo depuis son emplacement temporaire jusqu'à son emplacement définitif (chemin + nom)
    }

    public function uploadFile2()
    {
        // On récupère le nom de la photo
        $nom2 = $this->file2->getClientOriginalName(); //$_FILE['file']['name']
        $new_nom2 = $this->renamePhoto($nom2);
        $this->photo2 = $new_nom2; // /!\ sera enregistré en BDD

        //-----
        $this->file2->move($this->dirPhoto(), $new_nom2);
        // déplace la photo depuis son emplacement temporaire jusqu'à son emplacement définitif (chemin + nom)
    }

    public function uploadFile3()
    {
        // On récupère le nom de la photo
        $nom3 = $this->file3->getClientOriginalName(); //$_FILE['file']['name']
        $new_nom3 = $this->renamePhoto($nom3);
        $this->photo3 = $new_nom3; // /!\ sera enregistré en BDD

        //-----
        $this->file3->move($this->dirPhoto(), $new_nom3);
        // déplace la photo depuis son emplacement temporaire jusqu'à son emplacement définitif (chemin + nom)
    }

    public function uploadFile4()
    {
        // On récupère le nom de la photo
        $nom4 = $this->file4->getClientOriginalName(); //$_FILE['file']['name']
        $new_nom4 = $this->renamePhoto($nom4);
        $this->photo4 = $new_nom4; // /!\ sera enregistré en BDD

        //-----
        $this->file4->move($this->dirPhoto(), $new_nom4);
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
