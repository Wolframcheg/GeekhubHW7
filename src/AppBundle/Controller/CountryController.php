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
        $countries = [];
        $faker = \Faker\Factory::create();

        $x=0;
        while ($x++<25){
            $contryname = $faker->country;
            $slug = str_replace(' ', '-', $contryname);
            $slug = preg_replace('/[^A-Za-z\-]/', '', $slug);

            $country = new Country();
            $country->name = $contryname;
            $country->slug = strtolower($slug);

            array_push($countries,$country);
        }
        return ['countries' => $countries];
    }

    /**
     * @Route("/country/{slug}", requirements={"slug" = "[-_a-z]+"}, name="country_view")
     * @Method("GET")
     * @Template("AppBundle:Country:show.html.twig")
     */
    public function showAction($slug)
    {
        $faker = \Faker\Factory::create();
        $country = new Country();
        $country->slug = $slug;
        $country->name = $faker->country;
        $country->image = $faker->imageUrl(22,15);
        $country->info = $faker->text;
        return ['country' => $country];
    }
}