<?php

namespace Siga21\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PedidoController extends Controller
{
    
    public function portadaAction()
    {
        return $this->render('FrontendBundle::frontend.html.twig');
    }
}
