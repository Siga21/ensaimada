<?php

namespace Siga21\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siga21\BackendBundle\Entity\familia;
use Siga21\BackendBundle\Form\familiaType;

/**
 * familia controller.
 *
 */
class familiaController extends Controller
{
    /**
     * Lists all familia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BackendBundle:familia')->findAll();

        return $this->render('BackendBundle:familia:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a familia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:familia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find familia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:familia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new familia entity.
     *
     */
    public function newAction()
    {
        $entity = new familia();
        $form   = $this->createForm(new familiaType(), $entity);

        return $this->render('BackendBundle:familia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new familia entity.
     *
     */
    public function createAction()
    {
        $entity  = new familia();
        $request = $this->getRequest();
        $form    = $this->createForm(new familiaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('familia_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BackendBundle:familia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing familia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:familia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find familia entity.');
        }

        $editForm = $this->createForm(new familiaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendBundle:familia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing familia entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BackendBundle:familia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find familia entity.');
        }

        $editForm   = $this->createForm(new familiaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('familia_edit', array('id' => $id)));
        }

        return $this->render('BackendBundle:familia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a familia entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BackendBundle:familia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find familia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('familia'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
