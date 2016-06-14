<?php

namespace AdressBookBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdressBookBundle\Entity\Contacts;
use AdressBookBundle\Form\ContactsType;

/**
 * Contacts controller.
 *
 */
class ContactsController extends Controller
{
    /**
     * Lists all Contacts entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('AdressBookBundle:Contacts')->findAll();

        return $this->render('contacts/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Creates a new Contacts entity.
     *
     */
    public function newAction(Request $request)
    {
        $contact = new Contacts();
        $form = $this->createForm('AdressBookBundle\Form\ContactsType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contacts_show', array('id' => $contact->getId()));
        }

        return $this->render('contacts/new.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contacts entity.
     *
     */
    public function showAction(Contacts $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);

        return $this->render('contacts/show.html.twig', array(
            'contact' => $contact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contacts entity.
     *
     */
    public function editAction(Request $request, Contacts $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);
        $editForm = $this->createForm('AdressBookBundle\Form\ContactsType', $contact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contacts_edit', array('id' => $contact->getId()));
        }

        return $this->render('contacts/edit.html.twig', array(
            'contact' => $contact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contacts entity.
     *
     */
    public function deleteAction(Request $request, Contacts $contact)
    {
        $form = $this->createDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contact);
            $em->flush();
        }

        return $this->redirectToRoute('contacts_index');
    }

    /**
     * Creates a form to delete a Contacts entity.
     *
     * @param Contacts $contact The Contacts entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contacts $contact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contacts_delete', array('id' => $contact->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
