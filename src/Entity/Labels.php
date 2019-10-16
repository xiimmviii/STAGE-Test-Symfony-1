<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LabelsRepository")
 */
class Labels
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
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\icons", inversedBy="labels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $svg_nom;

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

    public function getSvgNom(): ?icons
    {
        return $this->svg_nom;
    }

    public function setSvgNom(?icons $svg_nom): self
    {
        $this->svg_nom = $svg_nom;

        return $this;
    }
}
