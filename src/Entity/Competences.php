<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetencesRepository")
 */
class Competences
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
    private $Competence;

        public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetence(): ?string
    {
        return $this->Competence;
    }

    public function setCompetence(string $Competence): self
    {
        $this->Competence = $Competence;

        return $this;
    }

    
}
