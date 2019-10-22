<?php

namespace App\Entity;

use App\Entity\Picture;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\GalerieRepository")
 * 
 */
class Galerie
{

    //permet de créer un array avec toutes les photos qui seront dans un objet galerie
    public function __construct()
    {
        $this->updated_at = new \DateTime();
        $this->photos = new ArrayCollection;
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * C'est grâce à ce code qu'on fait le lien entre cette table et la table "photo"
     * Une galerie peut avoir en théorie 0 photos min  et N photos max => OnetoMany
     *
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="galerie", cascade={"persist"}, orphanRemoval=true)
     *                                table       Clé étrangère   permet de supprimer les photos contenues dans une galerie quand on supprime la galerie
     *
     *
     * Contient toutes les photos de la galerie (Array composé d'objets photo)
     */
    private $pictures;

    /**
     * 
     */
    private $pictureFiles;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;


    public function __toString()
{
    return (string)$this->getId();
}

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


    /**
     *@return mixed
     */
    public function getPictureFiles()
    {
        return $this->pictureFiles;
    }

    /**
     * 
     * @param mixed $pictureFiles
     * @return Galerie
     * 
     */
    public function setPictureFiles($pictureFiles): self
    {

        foreach ($pictureFiles as $pictureFile) {
            $picture = new Picture;
            $picture->setImageFile($pictureFile);
            $this->addPicture($picture);
        }
        $this->pictureFiles = $pictureFiles;
        return $this;
    }


    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }





    //------------------------------pour joindre les deux tables photo et galerie

        /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function getPicture(): ?Picture
    {
        if ($this->pictures->isEmpty()) {
            return null;
        }
        return $this->pictures->first();
    }

    public function addPicture(Picture $picture): self
    {
            $this->pictures[] = $picture;
            $picture->setGalerie($this);
        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->picturess->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getGalerie() === $this) {
                $picture->setGalerie(null);
            }
        }

        return $this;
    }

}

