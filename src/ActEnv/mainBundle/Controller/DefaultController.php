<?php

namespace ActEnv\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('ActEnvmainBundle:Default:index.html.twig');
    }

    public function activiteAction()
    {
        return $this->render('ActEnvmainBundle:Default:activite.html.twig');
    }

    public function pourquiAction()
    {
        return $this->render('ActEnvmainBundle:Default:pourqui.html.twig');
    }

    public function valorisationAction()
    {
        return $this->render('ActEnvmainBundle:Default:valorisation.html.twig');
    }

}
