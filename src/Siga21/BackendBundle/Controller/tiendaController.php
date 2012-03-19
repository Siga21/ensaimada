<?php

namespace Siga21\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siga21\BackendBundle\Entity\tienda;
use Siga21\BackendBundle\Form\tiendaType;

/**
 * tienda controller.
 *
 */
class tiendaController extends Controller
{
    /**
     * Lists all tienda entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BackendBundle:tienda')->findAll();

        return $this->render('BackendBundle:tienda:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a tienda entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:tienda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tienda entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:tienda:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new tienda entity.
     *
     */
    public function newAction()
    {
        $entity = new tienda();
        $form   = $this->createForm(new tiendaType(), $entity);

        return $this->render('BackendBundle:tienda:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new tienda entity.
     *
     */
    public function createAction()
    {
        $entity  = new tienda();
        $request = $this->getRequest();
        $form    = $this->createForm(new tiendaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tienda_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BackendBundle:tienda:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing tienda entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:tienda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tienda entity.');
        }

        $editForm = $this->createForm(new tiendaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:tienda:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing tienda entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:tienda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find tienda entity.');
        }

        $editForm   = $this->createForm(new tiendaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tienda_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:tienda:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tienda entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BackendBundle:tienda')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find tienda entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tienda'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
