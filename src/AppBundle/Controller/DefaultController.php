<?php

namespace AppBundle\Controller;

use AppBundle\Model\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Template("AppBundle:default:index.html.twig")
     */
    public function indexAction()
    {
        $round1_8 = [];
        $round1_4 = [];
        $round1_2 = [];
        $roundFinal = [];
        $winner = [];

        $faker = \Faker\Factory::create();
        $x = 0;
        while ($x++ < 8) {
            $game = new Game();
            $game->team1Name = $faker->country;
            $game->team1Image = $faker->imageUrl(22, 15);

            $game->team2Name = $faker->country;
            $game->team2Image = $faker->imageUrl(22, 15);
            array_push($round1_8, $game);
        }
        return [
            'round1_8' => $round1_8,
            'round1_4' => $round1_4,
            'round1_2' => $round1_2,
            'roundFinal' => $roundFinal,
            'winner' => $winner
        ];
    }
}
