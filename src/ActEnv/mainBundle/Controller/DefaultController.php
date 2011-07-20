<?php

namespace ActEnv\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ActEnvmainBundle:Default:index.html.twig', array('name' => $name));
    }
}
