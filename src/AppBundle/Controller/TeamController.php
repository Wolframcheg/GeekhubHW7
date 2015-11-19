<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TeamController extends Controller
{

    /**
     * @Route("/team")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->forward("AppBundle:Default:index");
    }

    /**
     * @Route("/team/{slug}", requirements={"slug" = "[-_a-z]+"}, name="team_show")
     * @Method("GET")
     * @Template("AppBundle:Team:show.html.twig")
     */
    public function showAction($slug)
    {
        return [];
    }
}