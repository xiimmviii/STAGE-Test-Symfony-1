<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HorairesRepository")
 */
class Horaires
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Jour;

    /**
     * @ORM\Column(type="time")
     */
    private $Ouverture;

    /**
     * @ORM\Column(type="time")
     */
    private $Fermeture;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $Debut_Pause;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $Fin_Pause;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->Jour;
    }

    public function setJour(string $Jour): self
    {
        $this->Jour = $Jour;

        return $this;
    }

    public function getOuverture(): ?\DateTimeInterface
    {
        return $this->Ouverture;
    }

    public function setOuverture(\DateTimeInterface $Ouverture): self
    {
        $this->Ouverture = $Ouverture;

        return $this;
    }

    public function getFermeture(): ?\DateTimeInterface
    {
        return $this->Fermeture;
    }

    public function setFermeture(\DateTimeInterface $Fermeture): self
    {
        $this->Fermeture = $Fermeture;

        return $this;
    }

    public function getDebutPause(): ?\DateTimeInterface
    {
        return $this->Debut_Pause;
    }

    public function setDebutPause(?\DateTimeInterface $Debut_Pause): self
    {
        $this->Debut_Pause = $Debut_Pause;

        return $this;
    }

    public function getFinPause(): ?\DateTimeInterface
    {
        return $this->Fin_Pause;
    }

    public function setFinPause(?\DateTimeInterface $Fin_Pause): self
    {
        $this->Fin_Pause = $Fin_Pause;

        return $this;
    }
}
