<?php

namespace UA\UAplatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UA\UserBundle\Entity\Utilisateur;

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
    * @ORM\ManyToOne(targetEntity="UA\UserBundle\Entity\Utilisateur", cascade={"persist"},inversedBy="messages")
    * @ORM\JoinColumn(nullable=false)
    */
    private $utilisateur;


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
     * Set Utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return Message
     */
    public function setUtilisateur(Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get Utilisateur
     *
     * @return Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
