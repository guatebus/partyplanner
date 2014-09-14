<?php

namespace Party\Bundle\PublicBundle\Controller;

use Party\Bundle\PublicBundle\Form\AttendeeType;
use Party\Bundle\PrivateBundle\Entity\Attendee;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PartyPrivateBundle:Party')->findAll();

        return $this->render('PartyPublicBundle:Home:index.html.twig', array(
                'entities' => $entities,
            ));
    }

    /**
     * Creates a new Attendee entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Attendee();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            /*
                        $party = $em->getRepository('PartyPrivateBundle:Party')->find($request->query->get('id'));

                        $enty->addParty($party);

                        /*$previousAttendee = $em->getRepository('PartyPrivateBundle:Attendee')->findOneBy(array('email' => $form->getData()['email']));

                        if ($previousAttendee) {
            
                        }*/

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'flashMessage',
                array('state' => 'success','message' => 'RSVP Confirmed!')
            );

            return $this->redirect($this->generateUrl('public_index'));
        }

        return $this->render('PartyPublicBundle:Attendee:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
    }

    /**
     * Creates a form to create a Attendee entity.
     *
     * @param Attendee $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Attendee $entity)
    {
        $form = $this->createForm(new AttendeeType(), $entity, array(
                'action' => $this->generateUrl('attendee_create'),
                'method' => 'POST',
            ));

        $form->add('submit', 'submit', array('label' => 'Attend party'));

        return $form;
    }

    /**
     * Displays a form to create a new Attendee entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Attendee();
        $form   = $this->createCreateForm($entity);

        return $this->render('PartyPublicBundle:Attendee:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
    }


}
