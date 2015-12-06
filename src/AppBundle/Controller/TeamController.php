<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TeamController extends Controller
{

    /**
     * @Route("/teams", name="team_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $teams = $em->getRepository('AppBundle:Team')->findAll();

//        $teams = [];
//        $faker = \Faker\Factory::create();
//
//        $x = 0;
//        while ($x++ < 25) {
//            $contryname = $faker->country;
//            $slug = str_replace(' ', '-', $contryname);
//            $slug = preg_replace('/[^A-Za-z\-]/', '', $slug);
//
//            $team = new Team();
//            $team->name = $contryname;
//            $team->slug = $team->country_slug = strtolower($slug);
//            $team->image = $faker->imageUrl(22, 15);
//            array_push($teams, $team);
//        }
        return ['teams' => $teams];
    }

    /**
     * @Route("/team/{slug}", requirements={"slug" = "[-_a-z]+"}, name="team_show")
     * @Method("GET")
     * @Template("AppBundle:Team:show.html.twig")
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $team = $em->getRepository('AppBundle:Team')->getTeamByCountrySlug($slug);
        $players = $team->getUsersByRole(User::ROLE_PLAYER);
        $coachs= $team->getUsersByRole(User::ROLE_COACH);

        $games = $em->getRepository('AppBundle:Game')->getGamesByTeam($team);

//        $faker = \Faker\Factory::create();
//        $contryname = $faker->country;
//
//        $team = new Team();
//        $team->name = $contryname;
//        $team->info = $faker->text;
//
//        $players = [];
//        $x = 0;
//        while ($x++ < 14) {
//            $user = new User();
//            $user->name = $faker->firstName;
//            $user->lastName = $faker->lastName;
//            $user->id = $faker->numberBetween(1, 100);
//            array_push($players, $user);
//        }
//
//        $coachs = [];
//        $x = 0;
//        while ($x++ < 4) {
//            $user = new User();
//            $user->name = $faker->firstName;
//            $user->lastName = $faker->lastName;
//            $user->id = $faker->numberBetween(1, 100);
//            array_push($coachs, $user);
//        }
//
//        $games = [];
//        $x = 0;
//        while ($x++ < 4) {
//            $game = new Game();
//            $game->team1Name = $contryname;
//            $game->team1Score = $faker->numberBetween(0, 10);
//
//            $game->team2Name = $faker->country;
//            $game->team2Score = $faker->numberBetween(0, 10);
//            $game->id = $faker->numberBetween(0, 100);
//            array_push($games,$game);
//        }

        return [
            'team' => $team,
            'players' => $players,
            'coachs' => $coachs,
            'games' => $games
        ];
    }
}