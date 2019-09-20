<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecificitesRepository")
 */
class Specificites
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
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pageGoogle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation9;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation10;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence9;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence10;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getPageGoogle(): ?string
    {
        return $this->pageGoogle;
    }

    public function setPageGoogle(?string $pageGoogle): self
    {
        $this->pageGoogle = $pageGoogle;

        return $this;
    }

    public function getLocalisation1(): ?string
    {
        return $this->localisation1;
    }

    public function setLocalisation1(?string $localisation1): self
    {
        $this->localisation1 = $localisation1;

        return $this;
    }

    public function getLocalisation2(): ?string
    {
        return $this->localisation2;
    }

    public function setLocalisation2(?string $localisation2): self
    {
        $this->localisation2 = $localisation2;

        return $this;
    }

    public function getLocalisation3(): ?string
    {
        return $this->localisation3;
    }

    public function setLocalisation3(?string $localisation3): self
    {
        $this->localisation3 = $localisation3;

        return $this;
    }

    public function getLocalisation4(): ?string
    {
        return $this->localisation4;
    }

    public function setLocalisation4(?string $localisation4): self
    {
        $this->localisation4 = $localisation4;

        return $this;
    }

    public function getLocalisation5(): ?string
    {
        return $this->localisation5;
    }

    public function setLocalisation5(?string $localisation5): self
    {
        $this->localisation5 = $localisation5;

        return $this;
    }

    public function getLocalisation6(): ?string
    {
        return $this->localisation6;
    }

    public function setLocalisation6(?string $localisation6): self
    {
        $this->localisation6 = $localisation6;

        return $this;
    }

    public function getLocalisation7(): ?string
    {
        return $this->localisation7;
    }

    public function setLocalisation7(?string $localisation7): self
    {
        $this->localisation7 = $localisation7;

        return $this;
    }

    public function getLocalisation8(): ?string
    {
        return $this->localisation8;
    }

    public function setLocalisation8(?string $localisation8): self
    {
        $this->localisation8 = $localisation8;

        return $this;
    }

    public function getLocalisation9(): ?string
    {
        return $this->localisation9;
    }

    public function setLocalisation9(?string $localisation9): self
    {
        $this->localisation9 = $localisation9;

        return $this;
    }

    public function getLocalisation10(): ?string
    {
        return $this->localisation10;
    }

    public function setLocalisation10(?string $localisation10): self
    {
        $this->localisation10 = $localisation10;

        return $this;
    }

    public function getCompetence1(): ?string
    {
        return $this->competence1;
    }

    public function setCompetence1(string $competence1): self
    {
        $this->competence1 = $competence1;

        return $this;
    }

    public function getCompetence2(): ?string
    {
        return $this->competence2;
    }

    public function setCompetence2(string $competence2): self
    {
        $this->competence2 = $competence2;

        return $this;
    }

    public function getCompetence3(): ?string
    {
        return $this->competence3;
    }

    public function setCompetence3(string $competence3): self
    {
        $this->competence3 = $competence3;

        return $this;
    }

    public function getCompetence4(): ?string
    {
        return $this->competence4;
    }

    public function setCompetence4(string $competence4): self
    {
        $this->competence4 = $competence4;

        return $this;
    }

    public function getCompetence5(): ?string
    {
        return $this->competence5;
    }

    public function setCompetence5(?string $competence5): self
    {
        $this->competence5 = $competence5;

        return $this;
    }

    public function getCompetence6(): ?string
    {
        return $this->competence6;
    }

    public function setCompetence6(?string $competence6): self
    {
        $this->competence6 = $competence6;

        return $this;
    }

    public function getCompetence7(): ?string
    {
        return $this->competence7;
    }

    public function setCompetence7(?string $competence7): self
    {
        $this->competence7 = $competence7;

        return $this;
    }

    public function getCompetence8(): ?string
    {
        return $this->competence8;
    }

    public function setCompetence8(?string $competence8): self
    {
        $this->competence8 = $competence8;

        return $this;
    }

    public function getCompetence9(): ?string
    {
        return $this->competence9;
    }

    public function setCompetence9(?string $competence9): self
    {
        $this->competence9 = $competence9;

        return $this;
    }

    public function getCompetence10(): ?string
    {
        return $this->competence10;
    }

    public function setCompetence10(?string $competence10): self
    {
        $this->competence10 = $competence10;

        return $this;
    }
}
