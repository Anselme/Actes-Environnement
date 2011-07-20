<?php

namespace ActEnv\contactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

use ActEnv\contactBundle\Form\ContactType;
use ActEnv\contactBundle\Model\Contact;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Route("/contact", name="_default_contact")
     * @Template()
     */
    public function contactAction()
    {
        $contact = new Contact();
        $contactType = new ContactType();

        $form = $this->get('form.factory')->create($contactType, $contact);

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            if ($form->isValid()) {

                $lastname = $contact->lastName ;
                $firstname =  $contact->firstName ;
                $phone =  $contact->phone ;
                $courriel =  $contact->courriel ;
                $message =  $contact->message ;

                $mail = \Swift_Message::newInstance()
        ->setSubject('Quelqu\'un a rempli le formulaire de contact...')
        ->setFrom($this->container->getParameter('contact_email_from'))
        ->setTo($this->container->getParameter('contact_email_to'))
        ->setBody($this->renderView('ActEnvcontactBundle:Default:email.txt.twig',
        array('firstname' => $firstname,
              'lastname' => $lastname,
              'courriel' => $courriel,
              'phone' => $phone,
              'message' => $message)
          ));

                $this->get('mailer')->send($mail);

                $this->get('session')->setFlash('notice', 'Votre message a bien été envoyé ! Nous vous répondons au plus tôt.');

                return new RedirectResponse($this->generateUrl('_default_contact'));
            }
        }

        return array('form' => $form->createView());
    }

}
