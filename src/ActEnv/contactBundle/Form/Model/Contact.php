<?php

namespace ActEnv\contactBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;


class Contact
{
    /**
     * @var string
     * @Assert\NotBlank(message="Merci de saisir votre nom.")
     */
    public $lastName;

    /**
     *  @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     * @Assert\NotBlank(message="Merci de saisir un message.")
     */
    public $message;

    /**
     * @var string
     * @Assert\NotBlank(message="merci de saisir une adresse courriel.")
     * @Assert\Email(message="Email non valide.")
     */
    public $email;

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email ;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message ;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone ;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName ;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName ;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

}
