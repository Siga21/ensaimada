<?php

namespace Siga21\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class SitioController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('BackendBundle::backend.html.twig');
    }
}
