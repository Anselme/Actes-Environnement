<?php

namespace ActEnv\actualiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ActEnv\actualiteBundle\Entity\Actualite
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Actualite
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var text $text
     *
     * @ORM\Column(name="text", type="text")
     * @Assert\NotBlank()
     */
    private $text;

    /**
     * var boolean $isOnLine
     *
     * @ORM\Column(name="isOnLine", type="boolean")
     */
    private $isOnLine = true ;

    /**
     * var datetime $publicationDate
     *
     * @ORM\Column(name="publicationDate", type="datetime")
     */
    private $publicationDate;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set isOnLine
     *
     * @param boolean $isOnLine
     */
    public function setIsOnLine($isOnLine)
    {
        $this->isOnLine = $isOnLine;
    }

    /**
     * Get isOnLine
     *
     * @return boolean
     */
    public function getIsOnLine()
    {
        return $this->isOnLine;
    }

    /**
     * Set publicationDate
     *
     * @param datetime $publicationDate
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * Get publicationDate
     *
     * @return datetime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }
}
