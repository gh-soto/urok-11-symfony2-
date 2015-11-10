<?php

namespace MCM\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MCM\DemoBundle\Entity\Fsname;
use MCM\DemoBundle\Form\FsnameType;

/**
 * Fsname controller.
 *
 * @Route("/fsname")
 */
class FsnameController extends Controller
{

    /**
     * Lists all Fsname entities.
     *
     * @Route("/viewall", name="fsname")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MCMDemoBundle:Fsname')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Fsname entity.
     *
     * @Route("/", name="fsname_create")
     * @Method("POST")
     * @Template("MCMDemoBundle:Fsname:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Fsname();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fsname_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Fsname entity.
     *
     * @param Fsname $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fsname $entity)
    {
        $form = $this->createForm(new FsnameType(), $entity, array(
            'action' => $this->generateUrl('fsname_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Fsname entity.
     *
     * @Route("/", name="fsname_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fsname();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Fsname entity.
     *
     * @Route("/{id}", name="fsname_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MCMDemoBundle:Fsname')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fsname entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Fsname entity.
     *
     * @Route("/{id}/edit", name="fsname_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MCMDemoBundle:Fsname')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fsname entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Fsname entity.
    *
    * @param Fsname $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fsname $entity)
    {
        $form = $this->createForm(new FsnameType(), $entity, array(
            'action' => $this->generateUrl('fsname_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Fsname entity.
     *
     * @Route("/{id}", name="fsname_update")
     * @Method("PUT")
     * @Template("MCMDemoBundle:Fsname:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MCMDemoBundle:Fsname')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fsname entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fsname_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Fsname entity.
     *
     * @Route("/{id}", name="fsname_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MCMDemoBundle:Fsname')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fsname entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fsname'));
    }

    /**
     * Creates a form to delete a Fsname entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fsname_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
