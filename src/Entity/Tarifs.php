<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifsRepository")
 */
class Tarifs
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
    private $prestation;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifJour;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tarifNuit;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tarifWeekend;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrestation(): ?string
    {
        return $this->prestation;
    }

    public function setPrestation(string $prestation): self
    {
        $this->prestation = $prestation;

        return $this;
    }

    public function getTarifJour(): ?float
    {
        return $this->tarifJour;
    }

    public function setTarifJour(?float $tarifJour): self
    {
        $this->tarifJour = $tarifJour;

        return $this;
    }

    public function getTarifNuit(): ?float
    {
        return $this->tarifNuit;
    }

    public function setTarifNuit(?float $tarifNuit): self
    {
        $this->tarifNuit = $tarifNuit;

        return $this;
    }

    public function getTarifWeekend(): ?float
    {
        return $this->tarifWeekend;
    }

    public function setTarifWeekend(?float $tarifWeekend): self
    {
        $this->tarifWeekend = $tarifWeekend;

        return $this;
    }
}
