<?php

namespace ActEnv\contactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('email', 'email');
        $builder->add('lastname', 'text');
        $builder->add('firstname', 'text', array('required'=>false));
        $builder->add('phone', 'text', array('required'=>false));
        $builder->add('message', 'textarea');
    }

    function getName()
    {
        return "actenv_contact" ;
    }

}
