<?php
namespace AppBundle\DataFixtures\ORM\test;

use AppBundle\Entity\Country;
use AppBundle\Entity\Game;
use AppBundle\Entity\Team;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadGamesData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $game = new Game();
        $game->setDate($faker->dateTime());
        $game->setTeam1($this->getReference("team-1"));
        $game->setTeam2($this->getReference("team-2"));
        $game->setScoreTeam1($faker->numberBetween(0, 10));
        $game->setScoreTeam2($faker->numberBetween(0, 10));
        $manager->persist($game);
        $manager->flush();
        $this->addReference("game-1", $game);

        $game = new Game();
        $game->setDate($faker->dateTime());
        $game->setTeam1($this->getReference("team-3"));
        $game->setTeam2($this->getReference("team-4"));
        $game->setScoreTeam1($faker->numberBetween(0, 10));
        $game->setScoreTeam2($faker->numberBetween(0, 10));
        $manager->persist($game);
        $manager->flush();
        $this->addReference("game-2", $game);

        $game = new Game();
        $game->setDate($faker->dateTime());
        $game->setTeam1($this->getReference("team-5"));
        $game->setTeam2($this->getReference("team-6"));
        $game->setScoreTeam1($faker->numberBetween(0, 10));
        $game->setScoreTeam2($faker->numberBetween(0, 10));
        $manager->persist($game);
        $manager->flush();
        $this->addReference("game-3", $game);

        $game = new Game();
        $game->setDate($faker->dateTime());
        $game->setTeam1($this->getReference("team-7"));
        $game->setTeam2($this->getReference("team-8"));
        $game->setScoreTeam1($faker->numberBetween(0, 10));
        $game->setScoreTeam2($faker->numberBetween(0, 10));
        $manager->persist($game);
        $manager->flush();
        $this->addReference("game-4", $game);

    }

    public function getOrder()
    {
        return 4;
    }
}