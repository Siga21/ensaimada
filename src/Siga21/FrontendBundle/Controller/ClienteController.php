<?php

namespace Siga21\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ClienteController extends Controller
{
    
    public function registroAction()
    {
        return $this->render('FrontendBundle::registro.html.twig');
    }

}
