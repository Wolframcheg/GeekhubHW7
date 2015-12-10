<?php

namespace AppBundle\Controller;

use AppBundle\Model\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {

        $curPage = $request->query->getInt('page', 1);
        $limit = 50;

        $em = $this->getDoctrine()->getManager();
        $count = $em->getRepository('AppBundle:User')->getCountAllUsers();
        $users = $em->getRepository('AppBundle:User')->getAllUsersWithPagination($limit, $curPage);


        if($count > ($limit*$curPage) ) $nextPage = $curPage+1;
            else $nextPage = false;

        if ($request->isXmlHttpRequest()) {
            $content = $this->renderView('AppBundle:User:_body_index.html.twig',
                                          ['users' => $users , 'nextPage' => $nextPage]);
            return new Response($content);
        }

        return ['users' => $users , 'nextPage' => $nextPage];



//        $em = $this->getDoctrine()->getManager();
//        $query = $em->getRepository('AppBundle:User')->getAllUsersWithDependenciesQuery();
//
//        $paginator  = $this->get('knp_paginator');
//        $pagination = $paginator->paginate(
//            $query, /* query NOT result */
//            $request->query->getInt('page', 1)/*page number*/,
//            50/*limit per page*/
//        );
//        $pagination->setTemplate('AppBundle:Pagination:pagination.html.twig');
//
//        if ($request->isXmlHttpRequest()) {
//            $content = $this->renderView('AppBundle:User:_body_index.html.twig',['pagination' => $pagination]);
//            return new Response($content);
//        }
//
//        return ['pagination' => $pagination];
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