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
        $paginador = $this->get('ideup.simple_paginator');
        $paginador->setItemsPerPage(1, 'tienda');
        $tienda = $paginador->paginate($em->getRepository('BackendBundle:tienda')->findTodasLasTiendas(),'tienda')->getResult();
        
        $em1 = $this->getDoctrine()->getEntityManager();
        /*$paginador2 = $this->get('ideup.simple_paginator');*/
        $paginador->setItemsPerPage(4, 'articulo');
        $articulo = $paginador->paginate($em1->getRepository('BackendBundle:articulo')->findTodosLosArticulos(),'articulo')->getResult();
                  
        return $this->render('FrontendBundle::portada.html.twig', array(
        'tienda' => $tienda,
        'articulo' => $articulo,
        'paginador' => $paginador,
        ));
    }
}
