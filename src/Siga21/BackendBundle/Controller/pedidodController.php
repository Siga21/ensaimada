<?php

namespace Siga21\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siga21\BackendBundle\Entity\pedidod;
use Siga21\BackendBundle\Form\pedidodType;

/**
 * pedidod controller.
 *
 */
class pedidodController extends Controller
{
    /**
     * Lists all pedidod entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BackendBundle:pedidod')->findAll();

        return $this->render('BackendBundle:pedidod:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a pedidod entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:pedidod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pedidod entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:pedidod:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new pedidod entity.
     *
     */
    public function newAction()
    {
        $entity = new pedidod();
        $form   = $this->createForm(new pedidodType(), $entity);

        return $this->render('BackendBundle:pedidod:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new pedidod entity.
     *
     */
    public function createAction()
    {
        $entity  = new pedidod();
        $request = $this->getRequest();
        $form    = $this->createForm(new pedidodType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pedidod_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BackendBundle:pedidod:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing pedidod entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:pedidod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pedidod entity.');
        }

        $editForm = $this->createForm(new pedidodType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:pedidod:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing pedidod entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:pedidod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pedidod entity.');
        }

        $editForm   = $this->createForm(new pedidodType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pedidod_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:pedidod:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pedidod entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BackendBundle:pedidod')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find pedidod entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pedidod'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
