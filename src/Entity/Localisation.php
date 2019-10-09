<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocalisationRepository")
 */
class Localisation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Secteur;

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSecteur(): ?string
    {
        return $this->Secteur;
    }

    public function setSecteur(?string $Secteur): self
    {
        $this->Secteur = $Secteur;

        return $this;
    }

   
    
}
