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
        $teams = $em->getRepository('AppBundle:Team')->getAllTeamsWithCountry();

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

        return [
            'team' => $team,
            'players' => $players,
            'coachs' => $coachs,
            'games' => $games
        ];
    }
}