<?php

namespace LOUVRE\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use LOUVRE\TicketBundle\Validator\Fermeture;
use LOUVRE\TicketBundle\Validator\JourPasse;
use LOUVRE\TicketBundle\Validator\Demijournee;
use LOUVRE\TicketBundle\Validator\SansVisiteur;
use LOUVRE\TicketBundle\Validator\MaxBillets;



/**
 * Billet
 *
 * @ORM\Table(name="billet")
 * @ORM\Entity(repositoryClass="LOUVRE\TicketBundle\Repository\BilletRepository")
 */
class Billet
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
     * @var \DateTime
     *
     * @ORM\Column(name="datedevisite", type="datetime")
     * @Fermeture()
     * 
     * @JourPasse()
     * @MaxBillets()
     */
    private $datedevisite;
    

    /**
     * @var string
     *
     * @ORM\Column(name="journeecomplete", type="string", length=255)
     * @Demijournee()
     */
    private $journeecomplete;
    
    
    /**
     * @ORM\OneToMany(targetEntity="LOUVRE\TicketBundle\Entity\Visiteur",  mappedBy="billet", cascade={"persist"})
     * 
     * @SansVisiteur()
     */
    private $visiteurs;
    
    
  


    public function __construct()
    {
         
        $this->date         =  new \Datetime('now', new \DateTimeZone('Europe/Paris'));
        $this->visiteurs   = new ArrayCollection();
        
    }

    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datedevisite
     *
     * @param \DateTime $datedevisite
     *
     * @return Billet
     */
    public function setDatedevisite($datedevisite)
    {
        $this->datedevisite = $datedevisite;

        return $this;
    }

    /**
     * Get datedevisite
     *
     * @return \DateTime
     */
    public function getDatedevisite()
    {
        return $this->datedevisite;
    }

    /**
     * Set journeecomplete
     *
     * @param string $journeecomplete
     *
     * @return Billet
     */
    public function setJourneecomplete($journeecomplete)
    {
        $this->journeecomplete = $journeecomplete;

        return $this;
    }

    /**
     * Get journeecomplete
     *
     * @return string
     */
    public function getJourneecomplete()
    {
        return $this->journeecomplete;
    }

    /**
     * Add visiteur
     *
     * @param \LOUVRE\TicketBundle\Entity\Visiteur $visiteur
     *
     * @return Billet
     */
    public function addVisiteur(\LOUVRE\TicketBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteurs[] = $visiteur;
        
        $visiteur->setBillet($this);

        return $this;
    }

    /**
     * Remove visiteur
     *
     * @param \LOUVRE\TicketBundle\Entity\Visiteur $visiteur
     */
    public function removeVisiteur(\LOUVRE\TicketBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteurs->removeElement($visiteur);
    }

    /**
     * Get visiteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisiteurs()
    {
        return $this->visiteurs;
    }
}