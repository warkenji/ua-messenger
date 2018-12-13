<?php

namespace UA\UAplatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    * @ORM\ManyToOne(targetEntity="UA\UAplatformBundle\Entity\Suggestion", cascade={"persist"},inversedBy="suggestions")
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
     * @param UA\UAplatfomBundle\Entity\Suggestion $user
     *
     * @return Suggestion
     */
    public function setUser(UA\UAplatfomBundle\Entity\Suggestion $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return UA\UAplatfomBundle\Entity\Suggestion
     */
    public function getUser()
    {
        return $this->user;
    }
}
