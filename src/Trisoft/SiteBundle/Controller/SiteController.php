<?php

namespace Trisoft\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Trisoft\SiteBundle\Entity\Site;
use Trisoft\SiteBundle\Form\SiteType;

/**
 * Site controller.
 *
 */
class SiteController extends Controller
{
    /**
     * Lists all Site entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TrisoftSiteBundle:Site')->findAll();

        return $this->render('TrisoftSiteBundle:Site:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Site entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Site();
        $form = $this->createForm(new SiteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('site', array('id' => $entity->getId())));
        }

        return $this->render('TrisoftSiteBundle:Site:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Site entity.
     *
     */
    public function newAction()
    {
        $entity = new Site();
        $form   = $this->createForm(new SiteType(), $entity);

        return $this->render('TrisoftSiteBundle:Site:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    
}
