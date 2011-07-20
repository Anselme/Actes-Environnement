<?php

namespace ActEnv\contactBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;


class Contact
{
    /**
     * @Assert\NotBlank(message="Merci de saisir votre nom.")
     */
    public $lastName;

    /**
     */
    public $firstName;

    /**
     */
    public $phone;

    /**
     * @Assert\NotBlank(message="Merci de saisir un message.")
     */
    public $message;

    /**
     * @Assert\Email(message="Email non valide.")
     */
    public $email;

}
