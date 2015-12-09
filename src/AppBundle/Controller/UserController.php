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
     * @Route("/user", name="user_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->getAllUsersWithпшеDependencies();
        var_dump($users);exit();
        return ['users' => $users];
    }



    /**
     * @Route("/user/{id}", requirements={"id" = "\d+"}, name="user_show")
     * @Method("GET")
     * @Template("AppBundle:User:show.html.twig")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        return ['user' => $user];
    }
}