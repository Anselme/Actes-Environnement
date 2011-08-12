<?php

namespace ActEnv\actualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ActEnv\actualiteBundle\Entity\Actualite;


class ActualiteController extends Controller
{

    public function indexAction()
    {
        $actualites = $this->getDoctrine()
            ->getrepository('ActEnvactualiteBundle:Actualite')
            ->findAll();

        return $this->render('ActEnvactualiteBundle:Actualite:actualite.html.twig', array('actualites' => $actualites));
    }
}
