<?php
namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtures\Loader;

class FixturesLoader extends Loader
{
    /**
     * Returns an array of file paths to fixtures
     *
     * @return array<string>
     */
    protected function getFixtures()
    {
        $env = $this->container->get('kernel')->getEnvironment();
        if ($env == 'test') {
            /* todo if need */
        }

        return [
            __DIR__.'/dev/countries.yml',
            __DIR__.'/dev/teams.yml',
            __DIR__.'/dev/players.yml',
            __DIR__.'/dev/coaches.yml',
            __DIR__.'/dev/games.yml',
            __DIR__.'/dev/brackets.yml',
        ];
    }

}