<?php

namespace ActEnv\actualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActEnv\actualiteBundle\Entity\Actualite;
use ActEnv\actualiteBundle\Form\ActualiteType;

/**
 * Actualite controller.
 *
 * @Route("/actualite")
 */
class ActualiteAdminController extends Controller
{
    /**
     * Lists all Actualite entities.
     *
     * @Route("/", name="actualite")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ActEnvactualiteBundle:Actualite')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Actualite entity.
     *
     * @Route("/{id}/show", name="actualite_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActEnvactualiteBundle:Actualite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Actualite entity.
     *
     * @Route("/new", name="actualite_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Actualite();
        $form   = $this->createForm(new ActualiteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Actualite entity.
     *
     * @Route("/create", name="actualite_create")
     * @Method("post")
     * @Template("ActEnvactualiteBundle:ActualiteAdmin:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Actualite();
        $request = $this->getRequest();
        $form    = $this->createForm(new ActualiteType(), $entity);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('actualite_show', array('id' => $entity->getId())));

            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Actualite entity.
     *
     * @Route("/{id}/edit", name="actualite_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActEnvactualiteBundle:Actualite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualite entity.');
        }

        $editForm = $this->createForm(new ActualiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Actualite entity.
     *
     * @Route("/{id}/update", name="actualite_update")
     * @Method("post")
     * @Template("ActEnvactualiteBundle:ActualiteAdmin:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActEnvactualiteBundle:Actualite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualite entity.');
        }

        $editForm   = $this->createForm(new ActualiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('actualite_edit', array('id' => $id)));
            }
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Actualite entity.
     *
     * @Route("/{id}/delete", name="actualite_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $entity = $em->getRepository('ActEnvactualiteBundle:Actualite')->find($id);

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Actualite entity.');
                }

                $em->remove($entity);
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('actualite_list'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
