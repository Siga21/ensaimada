<?php

namespace Siga21\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siga21\BackendBundle\Entity\cliente;
use Siga21\BackendBundle\Form\clienteType;

/**
 * cliente controller.
 *
 */
class clienteController extends Controller
{
    /**
     * Lists all cliente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BackendBundle:cliente')->findAll();

        return $this->render('BackendBundle:cliente:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a cliente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:cliente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new cliente entity.
     *
     */
    public function newAction()
    {
        $entity = new cliente();
        $form   = $this->createForm(new clienteType(), $entity);

        return $this->render('BackendBundle:cliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new cliente entity.
     *
     */
    public function createAction()
    {
        $entity  = new cliente();
        $request = $this->getRequest();
        $form    = $this->createForm(new clienteType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BackendBundle:cliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing cliente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cliente entity.');
        }

        $editForm = $this->createForm(new clienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:cliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing cliente entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cliente entity.');
        }

        $editForm   = $this->createForm(new clienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cliente_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:cliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cliente entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BackendBundle:cliente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find cliente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cliente'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
