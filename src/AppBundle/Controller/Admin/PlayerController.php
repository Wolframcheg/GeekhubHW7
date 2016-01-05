<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Player;
use AppBundle\Form\PlayerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Country controller.
 *
 * @Route("/admin/player")
 */
class PlayerController extends Controller
{

    /**
     * Lists all Country entities.
     *
     * @Route("/", name="admin_player")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Player')->getAllPlayersWithDependencies();

        $deleteForms = [];

        foreach ($entities as $entity) {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }

        return[
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ];
    }
    /**
     * Creates a new Country entity.
     *
     * @Route("/", name="player_create")
     * @Method("POST")
     * @Template("AppBundle:Player:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Player();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_player'));
        }

        return [
            'entity' => $entity,
            'form'   => $form->createView(),
        ];
    }

    /**
     * Creates a form to create a Country entity.
     *
     * @param Player $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Player $entity)
    {
        $form = $this->createForm(PlayerType::class, $entity, array(
            'action' => $this->generateUrl('player_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, ['label' => 'Save',
            'attr' => [ 'class' => 'btn btn-raised btn-success' ]
        ]);

        return $form;
    }

    /**
     * Displays a form to create a new Country entity.
     *
     * @Route("/new", name="player_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Player();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Country entity.
     *
     * @Route("/{id}/edit", name="admin_player_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Player')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Country entity.
    *
    * @param Player $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Player $entity)
    {
        $form = $this->createForm(PlayerType::class, $entity, [
            'action' => $this->generateUrl('admin_player_update', ['id' => $entity->getId()]),
            'method' => 'PUT',
        ]);

        $form->add('submit', SubmitType::class, ['label' => 'Save',
                    'attr' => [ 'class' => 'btn btn-raised btn-success' ]
        ]);

        return $form;
    }
    /**
     * Edits an existing Country entity.
     *
     * @Route("/{id}", name="admin_player_update")
     * @Method("PUT")
     * @Template()
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Player')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Country entity.');
        }


        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_player'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Country entity.
     *
     * @Route("/{id}", name="admin_player_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Player')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Country entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_player'));
    }

    /**
     * Creates a form to delete a Country entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_player_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, ['label' => ' ', 'attr' => [ 'class' => 'glyphicon glyphicon-trash btn-link' ]])
            ->getForm()
        ;
    }
}
