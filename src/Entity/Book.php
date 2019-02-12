<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="Book")
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="isbn", type="string", length=32, nullable=true)
     */
    private $isbn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=16, nullable=true)
     */
    private $number;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Author", mappedBy="book", cascade={"all"})
     */
    private $authors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Book
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set isbn.
     *
     * @param string|null $isbn
     *
     * @return Book
     */
    public function setIsbn($isbn = null)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn.
     *
     * @return string|null
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set number.
     *
     * @param string|null $number
     *
     * @return Book
     */
    public function setNumber($number = null)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number.
     *
     * @return string|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Add author.
     *
     * @param \App\Entity\Author $author
     *
     * @return Book
     */
    public function addAuthor(\App\Entity\Author $author)
    {
        if (! $this->authors->contains($author)) {
            $this->authors[] = $author;
            $author->setbook($this);
        }

        return $this;
    }

    /**
     * Remove author.
     *
     * @param \App\Entity\Author $author
     *
     * @return Book
     */
    public function removeAuthor(\App\Entity\Author $author)
    {
        if ($this->authors->contains($author)) {
            $this->authors->removeElement($author);
            // set the owning side to null (unless already changed)
            if ($author->getbook() === $this) {
                $author->setbook(null);
            }
        }

        return $this;
    }

    /**
     * Get authors.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    public function __toString()
    {
        return $this->title ?: '';
    }

}
