<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CountryController extends Controller
{

    /**
     * @Route("/country", name="country_index")
     * @Method("GET")
     * @Template("AppBundle:Country:index.html.twig")
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/country/{slug}", requirements={"slug" = "[-_a-z]+"}, name="country_view")
     * @Method("GET")
     * @Template("AppBundle:Country:show.html.twig")
     */
    public function showAction($slug)
    {
        return [];
    }
}