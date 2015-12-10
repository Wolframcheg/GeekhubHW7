<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Country;
use AppBundle\Entity\Team;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadUsersData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $x = 0;
        while ($x++ < 25) {
            $team = $this->getReference("team-{$x}");

            $i = 0;
            while ($i++ < 14) {
                $player = new User();
                $player->setName($faker->firstName);
                $player->setLastName($faker->lastName);
                $player->setRole(User::ROLE_PLAYER);
                $player->setDescription($faker->text);
                $player->setTeam($team);
                $manager->persist($player);
                $manager->flush();
            }

            $i = 0;
            while ($i++ < 4) {
                $coach = new User();
                $coach->setName($faker->firstName);
                $coach->setLastName($faker->lastName);
                $coach->setRole(User::ROLE_COACH);
                $coach->setDescription($faker->text);
                $coach->setTeam($team);
                $manager->persist($coach);
                $manager->flush();
            }
        }
    }

    public function getOrder()
    {
        return 3;
    }
}