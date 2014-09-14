<?php

namespace Party\Bundle\PrivateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Party\Bundle\PrivateBundle\Entity\Party;
use Party\Bundle\PrivateBundle\Form\PartyType;

/**
 * Party controller.
 *
 */
class PartyController extends Controller
{

    /**
     * Lists all Party entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PartyPrivateBundle:Party')->findAll();

        return $this->render('PartyPrivateBundle:Party:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Party entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Party();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'flashMessage',
                array('state' => 'success','message' => 'party.create_success')
            );

            return $this->redirect($this->generateUrl('party_show', array('id' => $entity->getId())));
        }

        return $this->render('PartyPrivateBundle:Party:edit.html.twig', array(
            'entity' => $entity,
            'type'      => 'Create',
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Party entity.
     *
     * @param Party $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Party $entity)
    {
        $form = $this->createForm(new PartyType(), $entity, array(
            'action' => $this->generateUrl('party_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Party entity.
     *
     */
    public function newAction()
    {
        $entity = new Party();
        $form   = $this->createCreateForm($entity);

        return $this->render('PartyPrivateBundle:Party:edit.html.twig', array(
            'entity' => $entity,
            'type'      => 'Create',
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Party entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyPrivateBundle:Party')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Party entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PartyPrivateBundle:Party:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Party entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyPrivateBundle:Party')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Party entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PartyPrivateBundle:Party:edit.html.twig', array(
            'entity'      => $entity,
            'type'      => 'Edit',
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Party entity.
    *
    * @param Party $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Party $entity)
    {
        $form = $this->createForm(new PartyType(), $entity, array(
            'action' => $this->generateUrl('party_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Party entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyPrivateBundle:Party')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Party entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'flashMessage',
                array('state' => 'success','message' => 'party.edit_success')
            );

            return $this->redirect($this->generateUrl('party'));
        }

        return $this->render('PartyPrivateBundle:Party:edit.html.twig', array(
            'entity'      => $entity,
            'type'      => 'Edit',
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Party entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PartyPrivateBundle:Party')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Party entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('party'));
    }

    /**
     * Creates a form to delete a Party entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('party_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => 'common.message.confirm_delete',
                'attr' => array('class' => 'btn btn-danger')
                ))
            ->getForm()
        ;
    }

    /**
     * @param $id
     *
     * @return Response
     */
    public function removeAction($id)
    {
        $entity = $this->getDoctrine()->getManager()->getRepository('PartyPrivateBundle:Party')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Party entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PartyPrivateBundle:Common:delete_modal_form.html.twig', array(
                'delete_form' => $deleteForm->createView(),
                'message' => $this->get('translator')->trans('common.message.confirm_deletion_of', array('partyname' => $entity->getName())),
            ));
    }
}
