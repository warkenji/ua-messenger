<?php

namespace UA\UAplatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="UA\UAplatformBundle\Repository\GroupeRepository")
 */
class Groupe
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="filiaire", type="string", length=255)
     */
    private $filiaire;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;

    /**
     * @var bool
     *
     * @ORM\Column(name="public", type="boolean")
     */
    private $public;

    /**
     * @ORM\OneToMany(targetEntity="UA\UAplatformBundle\Entity\Message", cascade={"persist"},mappedBy="groupe")
     * @ORM\JoinColumn(nullable=true)
     */
    private $messages;

    /**
     * @ORM\ManyToMany(targetEntity="UA\UserBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilistateur;



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
     * Set nom
     *
     * @param string $nom
     *
     * @return Groupe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set filiaire
     *
     * @param string $filiaire
     *
     * @return Groupe
     */
    public function setFiliaire($filiaire)
    {
        $this->filiaire = $filiaire;

        return $this;
    }

    /**
     * Get filiaire
     *
     * @return string
     */
    public function getFiliaire()
    {
        return $this->filiaire;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Groupe
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set public
     *
     * @param boolean $public
     *
     * @return Groupe
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return bool
     */
    public function getPublic()
    {
        return $this->public;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilistateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add message.
     *
     * @param \UA\UAplatformBundle\Entity\Message $message
     *
     * @return Groupe
     */
    public function addMessage(\UA\UAplatformBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message.
     *
     * @param \UA\UAplatformBundle\Entity\Message $message
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMessage(\UA\UAplatformBundle\Entity\Message $message)
    {
        return $this->messages->removeElement($message);
    }

    /**
     * Get messages.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }


    /**
     * Add utilistateur.
     *
     * @param \UA\UserBundle\Entity\Utilisateur $utilistateur
     *
     * @return Groupe
     */
    public function addUtilistateur(\UA\UserBundle\Entity\Utilisateur $utilistateur)
    {
        $this->utilistateur[] = $utilistateur;

        return $this;
    }

    /**
     * Remove utilistateur.
     *
     * @param \UA\UserBundle\Entity\Utilisateur $utilistateur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUtilistateur(\UA\UserBundle\Entity\Utilisateur $utilistateur)
    {
        return $this->utilistateur->removeElement($utilistateur);
    }

    /**
     * Get utilistateur.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilistateur()
    {
        return $this->utilistateur;
    }
}
