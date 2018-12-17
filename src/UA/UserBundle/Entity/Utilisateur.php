<?php

namespace UA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use UA\UAplatformBundle\Entity\Groupe;
use UA\UAplatformBundle\Entity\Message;
use UA\UAplatformBundle\Entity\Suggestion;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="UA\UserBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var \Doctrine\Common\Collections\Collection | Message[]
     * @ORM\OneToMany(targetEntity="UA\UAplatformBundle\Entity\Message", cascade={"persist"},mappedBy="utilisateur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $messages;

    /**
     * @var \Doctrine\Common\Collections\Collection | Suggestion[]
     * @ORM\OneToMany(targetEntity="UA\UAplatformBundle\Entity\Suggestion", cascade={"persist"},mappedBy="utilisateur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $suggestions;

    /**
     * @ORM\ManyToMany(targetEntity="UA\UAplatformBundle\Entity\Groupe", cascade={"persist"}, mappedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\JoinTable(name="groupe_utilisateur")
     */
    private $groupes;

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
     * @return Utilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Utilisateur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add groupe
     *
     * @param Groupe $groupe
     *
     * @return Utilisateur
     */
    public function addGroupe(Groupe $groupe)
    {
        $this->groupes[] = $groupe;

        return $this;
    }


    public function addMessage(Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param Message $message
     */
    public function removeMessage(Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection | Message[]
     */
    public function getMessages()
    {
        return $this->messages;
    }


    /**
     * Add suggestion
     *
     * @param Suggestion $suggestion
     *
     * @return Utilisateur
     */
    public function addSuggestion(Suggestion $suggestion)
    {
        $this->suggestions[] = $suggestion;

        return $this;
    }

    /**
     * Remove suggestion
     *
     * @param Suggestion $suggestion
     */
    public function removeSuggestion(Suggestion $suggestion)
    {
        $this->suggestions->removeElement($suggestion);
    }

    /**
     * Get suggestions
     *
     * @return \Doctrine\Common\Collections\Collection | Suggestion[]
     */
    public function getSuggestions()
    {
        return $this->suggestions;
    }

    /**
     * Remove groupe.
     *
     * @param \UA\UAplatformBundle\Entity\Groupe $groupe
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGroupe(Groupe $groupe)
    {
        return $this->groupes->removeElement($groupe);
    }

    /**
     * Get groupes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupes()
    {
        return $this->groupes;
    }
}
