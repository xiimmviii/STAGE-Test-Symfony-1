<?php 

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact {

    /**
     * 
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=35)
     */
    private $prenom;

/**
 * Getter for Prenom
 *
 * @return [type]
 */
public function getPrenom()
{
    return $this->prenom;
}

/**
 * Setter for Prenom
 * @var [type] prenom
 * exactMessage = "Vous devez renseigner {{ limit }} caractères"
 * @return self
 */
public function setPrenom($prenom)
{
    $this->prenom = $prenom;
    return $this;
}


     /**
     * 
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=35)
     */
    private $nom;

 /**
  * Getter for Nom
  *
  * @return [type]
  */
 public function getNom()
 {
     return $this->nom;
 }

 /**
  * Setter for Nom
  * @var [type] nom
  *
  * @return self
  */
 public function setNom($nom)
 {
     $this->nom = $nom;
     return $this;
 }


     /**
     * 
     * 
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min=2, 
     *      max=35
     * )
     */
    private $societe;

 /**
  * Getter for Societe
  *
  * @return [type]
  */
 public function getSociete()
 {
     return $this->societe;
 }

 /**
  * Setter for Societe
  * @var [type] societe
  *
  * @return self
  */
 public function setSociete($societe)
 {
     $this->societe = $societe;
     return $this;
 }


 /**
     * 
     * @var string|null
     *
     * @Assert\Telephone
     */
    private $telephone;

   /**
    * Getter for Telephone
    *
    * @return [type]
    */
   public function getTelephone()
   {
       return $this->telephone;
   }

   /**
    * Setter for Telephone
    * @var [type] telephone
    *
    * @return self
    */
   public function setTelephone($telephone)
   {
       $this->telephone = $telephone;
       return $this;
   }


     /**
     * 
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email
     */
    private $email;

   /**
    * Getter for Email
    *
    * @return [type]
    */
   public function getEmail()
   {
       return $this->email;
   }

   /**
    * Setter for Email
    * @var [type] email
    *
    * @return self
    */
   public function setEmail($email)
   {
       $this->email = $email;
       return $this;
   }


     /**
     * 
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=255)
     */
    private $objet;

  /**
   * Getter for Objet
   *
   * @return [type]
   */
  public function getObjet()
  {
      return $this->objet;
  }

  /**
   * Setter for Objet
   * @var [type] objet
   *
   * @return self
   */
  public function setObjet($objet)
  {
      $this->objet = $objet;
      return $this;
  }


     /**
     * 
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=15)
     */
    private $message;

  /**
   * Getter for Message
   *
   * @return [type]
   */
  public function getMessage()
  {
      return $this->message;
  }

  /**
   * Setter for Message
   * @var [type] message
   *
   * @return self
   */
  public function setMessage($message)
  {
      $this->message = $message;
      return $this;
  }


    /**
     * 
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=35)
     */
    private $idMail;

/**
 * Getter for ID_mail
 *
 * @return [type]
 */
public function getIdMail()
{
    return $this->idMail;
}

/**
 * Setter for ID_Mail
 * @var [type] idMail
 * exactMessage = "Vous devez renseigner {{ limit }} caractères"
 * @return self
 */
public function setIdMail($idMail)
{
    $this->idMail = $idMail;
    return $this;
}

  
}