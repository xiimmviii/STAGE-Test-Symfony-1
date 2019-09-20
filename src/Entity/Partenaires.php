<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

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

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
}
