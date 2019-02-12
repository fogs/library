<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lending
 *
 * @ORM\Table(name="Lending")
 * @ORM\Entity(repositoryClass="App\Repository\LendingRepository")
 */
class Lending
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="collectedAt", type="datetime", nullable=true)
     */
    private $collectedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="returnedAt", type="datetime", nullable=true)
     */
    private $returnedAt;

    /**
     * @var \App\Entity\Member
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="lendings", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     * })
     */
    private $member;

    /**
     * @var \App\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Book", inversedBy="lendings", cascade={"all"})
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
     * Set collectedAt.
     *
     * @param \DateTime|null $collectedAt
     *
     * @return Lending
     */
    public function setCollectedAt($collectedAt = null)
    {
        $this->collectedAt = $collectedAt;

        return $this;
    }

    /**
     * Get collectedAt.
     *
     * @return \DateTime|null
     */
    public function getCollectedAt()
    {
        return $this->collectedAt;
    }

    /**
     * Set returnedAt.
     *
     * @param \DateTime|null $returnedAt
     *
     * @return Lending
     */
    public function setReturnedAt($returnedAt = null)
    {
        $this->returnedAt = $returnedAt;

        return $this;
    }

    /**
     * Get returnedAt.
     *
     * @return \DateTime|null
     */
    public function getReturnedAt()
    {
        return $this->returnedAt;
    }

    /**
     * Set member.
     *
     * @param \App\Entity\Member|null $member
     *
     * @return Lending
     */
    public function setMember(\App\Entity\Member $member = null)
    {
        if ($this->member !== $member) {
            $this->member = $member;
        }

        return $this;
    }

    /**
     * Get member.
     *
     * @return \App\Entity\Member|null
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set book.
     *
     * @param \App\Entity\Book|null $book
     *
     * @return Lending
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

}
