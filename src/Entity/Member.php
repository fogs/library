<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 *
 * @ORM\Table(name="Member")
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 */
class Member
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
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailAddress", type="string", length=255, nullable=true)
     */
    private $emailAddress;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastLogin", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Lending", mappedBy="member", cascade={"all"})
     */
    private $lendings;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lendings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username.
     *
     * @param string|null $username
     *
     * @return Member
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set emailAddress.
     *
     * @param string|null $emailAddress
     *
     * @return Member
     */
    public function setEmailAddress($emailAddress = null)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress.
     *
     * @return string|null
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set lastLogin.
     *
     * @param \DateTime|null $lastLogin
     *
     * @return Member
     */
    public function setLastLogin($lastLogin = null)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin.
     *
     * @return \DateTime|null
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Add lending.
     *
     * @param \App\Entity\Lending $lending
     *
     * @return Member
     */
    public function addLending(\App\Entity\Lending $lending)
    {
        if (! $this->lendings->contains($lending)) {
            $this->lendings[] = $lending;
            $lending->setmember($this);
        }

        return $this;
    }

    /**
     * Remove lending.
     *
     * @param \App\Entity\Lending $lending
     *
     * @return Member
     */
    public function removeLending(\App\Entity\Lending $lending)
    {
        if ($this->lendings->contains($lending)) {
            $this->lendings->removeElement($lending);
            // set the owning side to null (unless already changed)
            if ($lending->getmember() === $this) {
                $lending->setmember(null);
            }
        }

        return $this;
    }

    /**
     * Get lendings.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLendings()
    {
        return $this->lendings;
    }

    public function __toString()
    {
        return $this->username ?: '';
    }

}
