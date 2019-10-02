<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\GalerieRepository")
 */
class Galerie
{

    //permet de créer un array avec toutes les photos qui seront dans un objet galerie
    public function __construct()
    {
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
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="galerie")
     *                                table       Clé étrangère
     *
     *
     * Contient toutes les photos de la galerie (Array composé d'objets photo)
     */
    private $photos;

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

    public function getPhotos()
    {
        return $this->photos;
    }

    public function setPhotos($photos)
    {
        $this->photos = $photos;
        return $this;
    }
}
