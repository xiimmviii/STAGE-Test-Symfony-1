<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DesignRepository")
 */
class Design
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
    private $categorie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bottomTrsW;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bottomTrsC;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $topTrsW;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $topTrsC;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $soustitreIconW;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $soustitreIconC;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateAffichage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getBottomTrsW(): ?string
    {
        return $this->bottomTrsW;
    }

    public function setBottomTrsW(?string $bottomTrsW): self
    {
        $this->bottomTrsW = $bottomTrsW;

        return $this;
    }

    public function getBottomTrsC(): ?string
    {
        return $this->bottomTrsC;
    }

    public function setBottomTrsC(?string $bottomTrsC): self
    {
        $this->bottomTrsC = $bottomTrsC;

        return $this;
    }

    public function getTopTrsW(): ?string
    {
        return $this->topTrsW;
    }

    public function setTopTrsW(?string $topTrsW): self
    {
        $this->topTrsW = $topTrsW;

        return $this;
    }

    public function getTopTrsC(): ?string
    {
        return $this->topTrsC;
    }

    public function setTopTrsC(?string $topTrsC): self
    {
        $this->topTrsC = $topTrsC;

        return $this;
    }

    public function getSoustitreIconW(): ?string
    {
        return $this->soustitreIconW;
    }

    public function setSoustitreIconW(?string $soustitreIconW): self
    {
        $this->soustitreIconW = $soustitreIconW;

        return $this;
    }

    public function getSoustitreIconC(): ?string
    {
        return $this->soustitreIconC;
    }

    public function setSoustitreIconC(?string $soustitreIconC): self
    {
        $this->soustitreIconC = $soustitreIconC;

        return $this;
    }

    public function getDateAffichage(): ?string
    {
        return $this->dateAffichage;
    }

    public function setDateAffichage(?string $dateAffichage): self
    {
        $this->dateAffichage = $dateAffichage;

        return $this;
    }
}
