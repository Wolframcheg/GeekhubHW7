<?php

namespace AppBundle\Controller;

use AppBundle\Model\Country;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CountryController extends Controller
{

    /**
     * @Route("/countries", name="country_list")
     * @Method("GET")
     * @Template("AppBundle:Country:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('AppBundle:Country')->findAll();

        return ['countries' => $countries];
    }

    /**
     * @Route("/country/{slug}", requirements={"slug" = "[-_a-z]+"}, name="country_view")
     * @Method("GET")
     * @Template("AppBundle:Country:show.html.twig")
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $country = $em->getRepository('AppBundle:Country')->findOneBySlug($slug);

        return ['country' => $country];
    }
}