<?php

namespace AppBundle\Entity;

/**
 * BracketRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BracketRepository extends \Doctrine\ORM\EntityRepository
{
    public function getBracketByRound($round)
    {
        return $this->createQueryBuilder('bracket')
            ->Where('bracket.round = :round')
            ->setParameter('round', $round)
            ->getQuery()
            ->execute()
            ;
    }
}
