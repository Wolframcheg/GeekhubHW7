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
//        $countries = [];
//        $faker = \Faker\Factory::create();
//        $x = 0;
//
//        $em = $this->getDoctrine()->getManager();
//
//
//
//
//        while ($x++ < 25) {
//            $contryname = $faker->country;
//            $slug = str_replace(' ', '-', $contryname);
//            $slug = preg_replace('/[^A-Za-z\-]/', '', $slug);
//
//            $country = new \AppBundle\Entity\Country();
//            $country->setName($contryname);
//            $country->setSlug(strtolower($slug));
//            $country->setDescription($faker->text);
//            $country->setImage($faker->imageUrl(22, 15));
//
//            // $team = new Team();
//            //  $team->setDescription($faker->text);
//            // $team->setCountry($country);
//
//            //  $manager->persist($country);
//            // $manager->persist($team);
//            //   $manager->flush();
//            $em->persist($country);
//            $em->flush();
//            array_push($countries, $country);
//        }
//        var_dump($countries);exist();



        $em = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('AppBundle:Country')->findAll();

//        $countries = [];
//        $faker = \Faker\Factory::create();
//
//        $x = 0;
//        while ($x++ < 25) {
//            $contryname = $faker->country;
//            $slug = str_replace(' ', '-', $contryname);
//            $slug = preg_replace('/[^A-Za-z\-]/', '', $slug);
//
//            $country = new Country();
//            $country->name = $contryname;
//            $country->slug = strtolower($slug);
//
//            array_push($countries, $country);
//        }
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

//        $faker = \Faker\Factory::create();
//        $country = new Country();
//        $country->slug = $slug;
//        $country->name = $faker->country;
//        $country->image = $faker->imageUrl(22, 15);
//        $country->info = $faker->text;
        return ['country' => $country];
    }
}