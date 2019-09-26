<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface //l'entité USER doit absolument implémenter UserInterface pour fonctionner
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="role", type="string", length=20)
     */
    private $role = 'ROLE_ADMIN'; 
    //comme on n'a besoin que d'utilisateurs admins sur ce site, c'est le role qu'on donne par défaut à tous nos utilisateurs

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    //le mot de passe est sécurisé par un cryptage automatique (cf security.yaml)

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

        /**
     * @see UserInterface
     * 
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    //ne pas oublier l'array : 

    public function getRoles()
    {
        return [$this->role];
    }

    /** 
     * @see UserInterface
     * 
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    //-----------------------------------------


    // ╔═╗╔═╗╔╗╔╔╗╔╔═╗═╗ ╦╦╔═╗╔╗╔   ┬   ╔╦╗╔═╗╔═╗╔═╗╔╗╔╔╗╔╔═╗═╗ ╦╦╔═╗╔╗╔
    // ║  ║ ║║║║║║║║╣ ╔╩╦╝║║ ║║║║  ┌┼─   ║║║╣ ║  ║ ║║║║║║║║╣ ╔╩╦╝║║ ║║║║
    // ╚═╝╚═╝╝╚╝╝╚╝╚═╝╩ ╚═╩╚═╝╝╚╝  └┘   ═╩╝╚═╝╚═╝╚═╝╝╚╝╝╚╝╚═╝╩ ╚═╩╚═╝╝╚╝
    
    //-----------------------------------------

    /**
     * on paramètre l'identifiant qui sera utilisé pour la connexion (en l'occurrence l'email)
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }


    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // non utilisé puisqu'on utilise le bcrypt dans security.yaml, sert normalement à crypter le mot de passe
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        //sert à supprimer des données quand on stocke les données des utilisateurs (pas utile ici)
    }
}
