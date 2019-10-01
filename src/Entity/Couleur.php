<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CouleurRepository")
 */
class Couleur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $Couleur;

      /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $dateAffichage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): self
    {
        $this->Couleur = $Couleur;

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
}
