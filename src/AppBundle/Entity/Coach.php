<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CoachRepository")
 */
class Coach extends User
{
    const ROLENAME = 'coach';
}
