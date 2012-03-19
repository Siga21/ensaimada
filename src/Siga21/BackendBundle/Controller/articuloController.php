<?php

namespace Siga21\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siga21\BackendBundle\Entity\articulo;
use Siga21\BackendBundle\Form\articuloType;

/**
 * articulo controller.
 *
 */
class articuloController extends Controller
{
    /**
     * Lists all articulo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BackendBundle:articulo')->findAll();

        return $this->render('BackendBundle:articulo:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a articulo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:articulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find articulo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:articulo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new articulo entity.
     *
     */
    public function newAction()
    {
        $entity = new articulo();
        $form   = $this->createForm(new articuloType(), $entity);

        return $this->render('BackendBundle:articulo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new articulo entity.
     *
     */
    public function createAction()
    {
        $entity  = new articulo();
        $request = $this->getRequest();
        $form    = $this->createForm(new articuloType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articulo_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BackendBundle:articulo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing articulo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:articulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find articulo entity.');
        }

        $editForm = $this->createForm(new articuloType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:articulo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing articulo entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:articulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find articulo entity.');
        }

        $editForm   = $this->createForm(new articuloType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articulo_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:articulo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a articulo entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BackendBundle:articulo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find articulo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('articulo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
