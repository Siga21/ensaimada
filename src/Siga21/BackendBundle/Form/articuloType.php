<?php

namespace Siga21\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class articuloType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('precio')
            ->add('descripcion')
            ->add('vigente')
            ->add('ean13')
            ->add('imagen')
            ->add('familia_id')
        ;
    }

    public function getName()
    {
        return 'siga21_backendbundle_articulotype';
    }
}
