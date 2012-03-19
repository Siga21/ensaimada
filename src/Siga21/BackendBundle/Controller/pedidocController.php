<?php

namespace Siga21\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siga21\BackendBundle\Entity\pedidoc;
use Siga21\BackendBundle\Form\pedidocType;

/**
 * pedidoc controller.
 *
 */
class pedidocController extends Controller
{
    /**
     * Lists all pedidoc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BackendBundle:pedidoc')->findAll();

        return $this->render('BackendBundle:pedidoc:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a pedidoc entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:pedidoc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pedidoc entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:pedidoc:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new pedidoc entity.
     *
     */
    public function newAction()
    {
        $entity = new pedidoc();
        $form   = $this->createForm(new pedidocType(), $entity);

        return $this->render('BackendBundle:pedidoc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new pedidoc entity.
     *
     */
    public function createAction()
    {
        $entity  = new pedidoc();
        $request = $this->getRequest();
        $form    = $this->createForm(new pedidocType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pedidoc_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BackendBundle:pedidoc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing pedidoc entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:pedidoc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pedidoc entity.');
        }

        $editForm = $this->createForm(new pedidocType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:pedidoc:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing pedidoc entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:pedidoc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pedidoc entity.');
        }

        $editForm   = $this->createForm(new pedidocType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pedidoc_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:pedidoc:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pedidoc entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BackendBundle:pedidoc')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find pedidoc entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pedidoc'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
