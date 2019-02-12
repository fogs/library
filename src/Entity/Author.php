<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="Author")
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var \App\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Book", inversedBy="authors", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     * })
     */
    private $book;


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
     * Set name.
     *
     * @param string|null $name
     *
     * @return Author
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set book.
     *
     * @param \App\Entity\Book|null $book
     *
     * @return Author
     */
    public function setBook(\App\Entity\Book $book = null)
    {
        if ($this->book !== $book) {
            $this->book = $book;
        }

        return $this;
    }

    /**
     * Get book.
     *
     * @return \App\Entity\Book|null
     */
    public function getBook()
    {
        return $this->book;
    }

    public function __toString()
    {
        return $this->name ?: '';
    }

}
