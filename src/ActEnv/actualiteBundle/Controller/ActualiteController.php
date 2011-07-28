<?php

namespace ActEnv\actualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ActualiteController extends Controller
{

    public function indexAction()
    {
        return $this->render('ActEnvactualiteBundle:Actualite:actualite.html.twig');
    }
}
