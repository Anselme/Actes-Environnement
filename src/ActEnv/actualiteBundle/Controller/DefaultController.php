<?php

namespace ActEnv\actualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ActEnvactualiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
