<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player extends User
{
    const ROLENAME = 'player';

    /**
     *@ORM\ManyToOne(targetEntity="Team", inversedBy="players")
     */
    protected $team;

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Team $team
     *
     * @return User
     */
    public function setTeam(Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }
}
