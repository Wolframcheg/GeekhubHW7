<?php

namespace AppBundle\Entity;

/**
 * GameRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameRepository extends \Doctrine\ORM\EntityRepository
{
    public function getGamesByTeam(Team $team)
    {
        return $this->createQueryBuilder('game')
            ->select('game, team1, team2, country1, country2')
            ->Where('game.team1 = :teamId')
            ->orWhere('game.team2  = :teamId')
            ->join('game.team1','team1')
            ->join('game.team2','team2')
            ->join('team1.country','country1')
            ->join('team2.country','country2')
            ->setParameter('teamId', $team->getId())
            ->getQuery()
            ->execute()
            ;
    }

    public function getAllGamesWithDependencies()
    {
        return $this->createQueryBuilder('game')
            ->select('game, team1, team2, country1, country2')
            ->join('game.team1','team1')
            ->join('game.team2','team2')
            ->join('team1.country','country1')
            ->join('team2.country','country2')
            ->getQuery()
            ->getResult()
            ;
    }
}
