<?php

namespace Siga21\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class pedidocType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('fecha_entrega')
            ->add('importe')
            ->add('observaciones')
            ->add('cliente_id')
            ->add('tienda_id')
        ;
    }

    public function getName()
    {
        return 'siga21_backendbundle_pedidoctype';
    }
}
