<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReseauxRepository")
 */
class Reseaux
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
    private $Instagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Google;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstagram(): ?string
    {
        return $this->Instagram;
    }

    public function setInstagram(?string $Instagram): self
    {
        $this->Instagram = $Instagram;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->Facebook;
    }

    public function setFacebook(?string $Facebook): self
    {
        $this->Facebook = $Facebook;

        return $this;
    }

    public function getGoogle(): ?string
    {
        return $this->Google;
    }

    public function setGoogle(?string $Google): self
    {
        $this->Google = $Google;

        return $this;
    }
}
