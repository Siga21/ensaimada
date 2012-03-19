<?php

namespace Siga21\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class pedidodType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('importe')
            ->add('pedidoc_id')
            ->add('articulo_id')
        ;
    }

    public function getName()
    {
        return 'siga21_backendbundle_pedidodtype';
    }
}
