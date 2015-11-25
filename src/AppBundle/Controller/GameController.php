<?php

namespace AppBundle\Controller;

use AppBundle\Model\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GameController extends Controller
{

    /**
     * @Route("/games", name="game_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $games = [];
        $faker = \Faker\Factory::create();

        $x = 0;
        while ($x++ < 30) {
            $game = new Game();
            $game->team1Name = $faker->country;
            $game->team1Score = $faker->numberBetween(0, 10);

            $game->team2Name = $faker->country;
            $game->team2Score = $faker->numberBetween(0, 10);
            array_push($games, $game);
        }
        return ['games' => $games];
    }

    /**
     * @Route("/game/{id}", requirements={"id" = "\d+"}, name="game_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $faker = \Faker\Factory::create();
        $contryname = $faker->country;
        $slug = str_replace(' ', '-', $contryname);
        $slug = preg_replace('/[^A-Za-z\-]/', '', $slug);

        $game = new Game();
        $game->team1Name = $contryname;
        $game->team1Slug = strtolower($slug);
        $game->team1Score = $faker->numberBetween(0, 10);

        $contryname = $faker->country;
        $slug = str_replace(' ', '-', $contryname);
        $slug = preg_replace('/[^A-Za-z\-]/', '', $slug);
        $game->team2Name = $contryname;
        $game->team2Slug = strtolower($slug);
        $game->team2Score = $faker->numberBetween(0, 10);


        return ['game' => $game];
    }
}