<?php

namespace Siga21\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function portadaAction($name)
    {
        return $this->render('FrontendBundle::frontend.html.twig');
    }
}
