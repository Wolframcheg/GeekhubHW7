<?php
namespace AppBundle\DataFixtures\ORM\test;

use AppBundle\Entity\Bracket;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadBracketData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $bracket = new Bracket();
        $bracket->setRound(Bracket::ROUND_1_8);
        $bracket->setGame($this->getReference("game-1"));
        $manager->persist($bracket);
        $manager->flush();

        $bracket = new Bracket();
        $bracket->setRound(Bracket::ROUND_1_8);
        $bracket->setGame($this->getReference("game-2"));
        $manager->persist($bracket);
        $manager->flush();

        $bracket = new Bracket();
        $bracket->setRound(Bracket::ROUND_1_8);
        $bracket->setGame($this->getReference("game-3"));
        $manager->persist($bracket);
        $manager->flush();

        $bracket = new Bracket();
        $bracket->setRound(Bracket::ROUND_1_8);
        $bracket->setGame($this->getReference("game-4"));
        $manager->persist($bracket);
        $manager->flush();

    }

    public function getOrder()
    {
        return 5;
    }
}