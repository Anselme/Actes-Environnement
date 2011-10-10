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
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize = "1024k", mimeTypes = {
     * "image/gif",
     * "image/jpeg",
     * "image/png"
     * })
     */
    public $image;

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->image) {
            return;
        }

        $extension = $this->image->guessExtension();
        if(!$extension)
        {
            $extension = 'bin' ;
        }

        $brand_new_name = uniqid().'.'.$extension ;

        // move takes the target directory and then the target filename to move to
        $this->image->move($this->getUploadRootDir(), $brand_new_name);

        // set the path property to the filename where you'ved saved the file
        $this->setPath($brand_new_name);

        // clean up the file property as you won't need it anymore
        unset($this->image);
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // TODO ne pas mettre bundle/actenvactualite en dur ...
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'bundles/actenvactualite/upload/images';
    }

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

    /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
