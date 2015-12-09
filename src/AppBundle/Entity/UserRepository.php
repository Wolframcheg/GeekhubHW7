<?php

namespace AppBundle\Entity;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

    public function getAllUsersWithDependenciesQuery()
    {
        return $this->createQueryBuilder('user')
             ->select('user, team, country')
             ->join('user.team', 'team')
             ->join('team.country', 'country')
             ->getQuery()
             //->getResult();
             ;
    }
}
