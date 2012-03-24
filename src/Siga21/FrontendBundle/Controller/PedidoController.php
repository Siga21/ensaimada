<?php

namespace Siga21\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Siga21\BackendBundle\Entity\tienda;
use Siga21\BackendBundle\Entity\articulo;

class PedidoController extends Controller
{
    
    public function portadaAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('BackendBundle:tienda')->findById('4');

        $em1 = $this->getDoctrine()->getEntityManager();
        $entities2 = $em1->getRepository('BackendBundle:articulo')->findById('3');

        return $this->render('FrontendBundle::frontend.html.twig', array(
            'entities' => $entities, 'entities2' => $entities2
        ));


    }
}
