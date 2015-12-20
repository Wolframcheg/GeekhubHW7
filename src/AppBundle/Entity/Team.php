<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TeamRepository")
 */
class Team
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="Country")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     */
    private $players;

    /**
     * @ORM\OneToMany(targetEntity="Coach", mappedBy="team")
     */
    private $coaches;


    public function __construct() {
        $this->players = new ArrayCollection();
        $this->coaches = new ArrayCollection();
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
     * Set description
     *
     * @param string $description
     *
     * @return Team
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return Team
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }



    /**
     * Add players
     *
     * @param \AppBundle\Entity\Player $player
     * @return Team
     */
    public function addPlayer(\AppBundle\Entity\Player $player)
    {
        $this->players[] = $player;
        $player->setTeam($this);
        return $this;
    }

    /**
     * Remove players
     *
     * @param \AppBundle\Entity\Player $player
     */
    public function removePlayer(\AppBundle\Entity\Player $player)
    {
        $this->players->removeElement($player);
        $player->setTeam(null);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Add coaches
     *
     * @param \AppBundle\Entity\Coach $coach
     * @return Team
     */
    public function addCoach(\AppBundle\Entity\Coach $coach)
    {
        $this->coaches[] = $coach;
        $coach->setTeam($this);
        return $this;
    }

    /**
     * Remove coaches
     *
     * @param \AppBundle\Entity\Coach $coach
     */
    public function removeCoach(\AppBundle\Entity\Coach $coach)
    {
        $this->coaches->removeElement($coach);
        $coach->setTeam(null);
    }

    /**
     * Get coaches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCoaches()
    {
        return $this->coaches;
    }
}
