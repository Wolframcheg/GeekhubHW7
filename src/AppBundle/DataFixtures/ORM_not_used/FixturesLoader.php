<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class FixturesLoader extends AbstractLoader
{
    /**
     * Returns an array of file paths to fixtures
     *
     * @return array<string>
     */
    public function getFixtures()
    {
//        $env = $this->container->get('kernel')->getEnvironment();
//
//        if ($env == 'test') {
//
//            return [
//                __DIR__ . '/DataForTests/tags.yml',
//                __DIR__ . '/DataForTests/categories.yml',
//                __DIR__ . '/DataForTests/users.yml',
//            ];
//        }

        return [
            __DIR__ . '/Data/countries.yml',
            __DIR__ . '/Data/teams.yml'
//            __DIR__ . '/Data/categories.yml',
//            __DIR__ . '/Data/users.yml',
        ];
    }
}