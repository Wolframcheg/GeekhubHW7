<?php

namespace AppBundle\Repository;

/**
 * CoachRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CoachRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllCoachsWithDependencies()
    {
        return $this->createQueryBuilder('player')
            ->select('player, team, country')
            ->join('player.team', 'team')
            ->join('team.country', 'country')
            ->getQuery()
            ->getResult();
        ;
    }
}
