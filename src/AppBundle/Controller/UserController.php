<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Route("/user")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->redirectToRoute('homepage', [], 301);
    }

    /**
     * @Route("/user/{id}", requirements={"id" = "\d+"}, name="user_show")
     * @Method("GET")
     * @Template("AppBundle:User:show.html.twig")
     */
    public function showAction($id)
    {
        return [];
    }
}