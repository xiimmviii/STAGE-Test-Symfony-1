<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Labels;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IconsRepository")
 */
class Icons
{

    //permet de créer un array avec tous les labels qui seront dans un objet icon
    public function __construct()
    {
        $this->labels1 = new ArrayCollection;
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

        /**
     * C'est grâce à ce code qu'on fait le lien entre cette table et la table "labels"
     * Une icon peut avoir en théorie 0 labels associés min  et N labels associés max => OnetoMany
     *
     * @ORM\OneToMany(targetEntity="Labels", mappedBy="svg_nom", cascade={"persist"}, orphanRemoval=true)
     *                                table       Clé étrangère   permet de supprimer les labels associés à une icon quand on supprime l'icon
     *
     *
     * Contient tous les labels de l'icon (Array composé d'objets photo)
     */
    private $labels2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

            /**
     * @return Collection|Label[]
     */
    public function getLabels2(): Collection
    {
        return $this->labels2;
    }


    public function getLabel(): ?Labels
    {
        if ($this->labels2->isEmpty()) {
            return null;
        }
        return $this->labels2->first();
    }

}
