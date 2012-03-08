<?php

namespace Siga21\ExtranetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ExtranetBundle:Default:index.html.twig', array('name' => $name));
    }
}
