<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{

    /**
     * @Route("/games", name="game_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->findAll();

        return ['games' => $games];
    }

    /**
     * @Route("/game/{id}", requirements={"id" = "\d+"}, name="game_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('AppBundle:Game')->find($id);

        return ['game' => $game];
    }
}