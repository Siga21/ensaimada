<?php

namespace Siga21\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class clienteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('password')
            ->add('salt')
            ->add('direccion')
            ->add('telefono')
            ->add('telefono2')
            ->add('correo')
        ;
    }

    public function getName()
    {
        return 'siga21_backendbundle_clientetype';
    }
}
