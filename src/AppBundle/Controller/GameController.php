<?php

namespace AppBundle\Controller;

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
        return [];
    }

    /**
     * @Route("/game/{id}", requirements={"id" = "\d+"}, name="game_show")
     * @Method("GET")
     * @Template("AppBundle:Game:show.html.twig")
     */
    public function showAction($id)
    {
        return [];
    }
}