<?php

namespace UA\UAplatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UA\UserBundle\Entity\Utilisateur;

/**
 * Suggestion
 *
 * @ORM\Table(name="suggestion")
 * @ORM\Entity(repositoryClass="UA\UAplatformBundle\Repository\SuggestionRepository")
 */
class Suggestion
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
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
    * @ORM\ManyToOne(targetEntity="UA\UserBundle\Entity\Utilisateur", cascade={"persist"},inversedBy="suggestions")
    * @ORM\JoinColumn(nullable=false)
    */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Suggestion
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set user
     *
     * @param Utilisateur $user
     *
     * @return Suggestion
     */
    public function setUtilisateur(Utilisateur $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->user;
    }

    /**
     * Set user.
     *
     * @param \UA\UserBundle\Entity\Utilisateur $user
     *
     * @return Suggestion
     */
    public function setUser(\UA\UserBundle\Entity\Utilisateur $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \UA\UserBundle\Entity\Utilisateur
     */
    public function getUser()
    {
        return $this->user;
    }
}
