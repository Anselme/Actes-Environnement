<?php

namespace ActEnv\contactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ActEnvcontactBundle:Default:index.html.twig', array('name' => $name));
    }
}
