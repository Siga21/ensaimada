<?php

namespace Siga21\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class tiendaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('password')
            ->add('salt')
            ->add('nombre')
            ->add('direccion')
            ->add('poblacion')
            ->add('provincia')
            ->add('pais')
            ->add('telefono')
            ->add('fax')
            ->add('email')
        ;
    }

    public function getName()
    {
        return 'siga21_backendbundle_tiendatype';
    }
}
