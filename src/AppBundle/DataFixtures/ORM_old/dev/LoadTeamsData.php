<?php
namespace AppBundle\DataFixtures\ORM\prod;

use AppBundle\Entity\Country;
use AppBundle\Entity\Team;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadTeamsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $x = 0;
        while ($x++ < 23) {
            $country = $this->getReference("country-{$x}");

            $team = new Team();
            $team->setDescription($faker->text);
            $team->setCountry($country);
            $manager->persist($team);
            $manager->flush();
            $this->addReference("team-{$x}", $team);
        }
    }

    public function getOrder()
    {
        return 2;
    }
}