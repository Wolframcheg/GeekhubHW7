<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bracket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BracketRepository")
 */
class Bracket
{
    const ROUND_1_8 = '1/8';
    const ROUND_1_4 = '1/4';
    const ROUND_1_2 = '1/2';
    const ROUND_FINAL = 'final';
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
    * @ORM\Column(type="string", columnDefinition="ENUM('1/8', '1/4', '1/2', 'final')")
     */
    private $round;

    /**
     * @ORM\OneToOne(targetEntity="Game")
     */
    private $game;



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
     * Set round
     *
     * @param string $round
     *
     * @return Bracket
     */
    public function setRound($round)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return string
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Bracket
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }
}
