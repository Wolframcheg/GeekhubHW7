<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Coach;
use AppBundle\Form\CoachType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Country controller.
 *
 * @Route("/admin")
 */
class DefaultController extends Controller
{

    /**
     * Lists all Country entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

}
