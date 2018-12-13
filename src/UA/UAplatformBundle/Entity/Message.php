<?php

namespace UA\UAplatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="UA\UAplatformBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type_message", type="string", length=255)
     */
    private $typeMessage;
    /**
    * @ORM\ManyToOne(targetEntity="UA\UserBundle\Entity\User", cascade={"persist"},inversedBy="messages")
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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Message
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set typeMessage
     *
     * @param string $typeMessage
     *
     * @return Message
     */
    public function setTypeMessage($typeMessage)
    {
        $this->typeMessage = $typeMessage;

        return $this;
    }

    /**
     * Get typeMessage
     *
     * @return string
     */
    public function getTypeMessage()
    {
        return $this->typeMessage;
    }

    /**
     * Set user
     *
     * @param UA\UAplatfomBundle\Entity\User $user
     *
     * @return Message
     */
    public function setUser(UA\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return UA\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
