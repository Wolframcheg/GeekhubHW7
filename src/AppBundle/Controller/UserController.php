<?php

namespace AppBundle\Controller;

use AppBundle\Model\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user/{id}", requirements={"id" = "\d+"}, name="user_show")
     * @Method("GET")
     * @Template("AppBundle:User:show.html.twig")
     */
    public function showAction($id)
    {
        $faker = \Faker\Factory::create();
        $user = new User();
        $user->name = $faker->firstName;
        $user->lastName = $faker->lastName;
        $user->info = $faker->text;

        return ['user' => $user];
    }
}