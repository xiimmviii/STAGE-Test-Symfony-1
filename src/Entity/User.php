<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
	* @ORM\Column(name="role", type="string", length=20)
	*/
    private $role = 'ROLE_ADMIN';

    /**
	* @ORM\Column(name="salt", type="string", length=255, nullable=true)
	*/
    private $salt;


    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function setSalt($salt){
		$this -> salt = $salt;
		return $this;
	}
	
	public function getSalt(){
		return $this -> salt;
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setRole($role){
		$this -> role = $role;
		return $this;
	}

	public function getRole(){
		return $this -> role;
	}

    public function getRoles(){
		return [$this -> role];
    }

    public function eraseCredentials(){}

}
