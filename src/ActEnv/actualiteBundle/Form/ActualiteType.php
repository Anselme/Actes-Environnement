<?php

namespace ActEnv\actualiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title','text', array('label'=>'Titre'))
            ->add('text','textarea', array('label'=>'Contenu'))
            ->add('isOnLine','checkbox', array('required'=>false,'label' => 'Publié'))
            ->add('publicationDate')
        ;
    }

    public function getName()
    {
        return 'actenv_actualitebundle_actualitetype';
    }
}
