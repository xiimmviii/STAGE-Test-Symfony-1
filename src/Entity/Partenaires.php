<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Symfony\Component\Serializer\Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartenairesRepository")
 */
class Partenaires
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
    private $nomPartenaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sitePartenaire;

    /**
     * @var string|null
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    private $file;
    // On ne mappe pas cette propriété car elle n'existe pas dans la BDD. Elle va juste servir à récupérer les octets qui constituent l'image.

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPartenaire(): ?string
    {
        return $this->nomPartenaire;
    }

    public function setNomPartenaire(string $nomPartenaire): self
    {
        $this->nomPartenaire = $nomPartenaire;

        return $this;
    }

    public function getSitePartenaire(): ?string
    {
        return $this->sitePartenaire;
    }

    public function setSitePartenaire(string $sitePartenaire): self
    {
        $this->sitePartenaire = $sitePartenaire;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

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
        $new_nom = $this->renameLogo($nom);
        $this->logo = $new_nom; // /!\ sera enregistré en BDD

        //-----
        $this->file->move($this->dirLogo(), $new_nom);
        // déplace la photo depuis son emplacement temporaire jusqu'à son emplacement définitif (chemin + nom)
    }

    // renomme la photo de manière unique
    public function renameLogo($name)
    {
        return 'logo_' . time() . '_' . rand(1, 99999) . '_' . $name;
        //logo_1550000000_87534_nom.jpg
    }

    // Nous retourne le chemin du dossier photo
    public function dirLogo()
    {
        return __DIR__ . '/../../public/photo/logos';
    }

    // Supprimer un fichier photo
    public function removeLogo()
    {
        $file = $this->dirLogo() . $this->getLogo();
        if (file_exists($file) && $this->getLogo() != 'defaultlogo.jpg') {
            unlink($file);
        }
    }

    //------------------------------------- /FONCTION POUR LA PHOTO  ------------------------------------------------


    public function serialize()
    { }
    public function unserialize($arg)
    { }
}
