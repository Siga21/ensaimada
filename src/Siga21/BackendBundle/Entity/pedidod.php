<?php

namespace Siga21\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siga21\BackendBundle\Entity\pedidod
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Siga21\BackendBundle\Entity\pedidodRepository")
 */
class pedidod
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /** 
       * @ORM\ManyToOne(targetEntity="Siga21\BackendBundle\Entity\pedidoc")
       */
    private $pedidoc_id;

     /** 
       * @ORM\ManyToOne(targetEntity="Siga21\BackendBundle\Entity\articulo")
       */
    private $articulo_id;

    /**
     * @var integer $cantidad
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var decimal $importe
     *
     * @ORM\Column(name="importe", type="decimal", scale=2)
     */
    private $importe;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pedidoc_id
     *
     * @param Siga21\BackendBundle\Entity\pedidoc $pedidocId
     */
    public function setPedidocId(\Siga21\BackendBundle\Entity\pedidoc $pedidocId)
    {
        $this->pedidoc_id = $pedidocId;
    }

    /**
     * Get pedidoc_id
     *
     * @return Siga21\BackendBundle\Entity\pedidoc
     */
    public function getPedidocId()
    {
        return $this->pedidoc_id;
    }

    /**
     * Set articulo_id
     *
     * @param Siga21\BackendBundle\Entity\articulo $articuloId
     */
    public function setArticuloId(\Siga21\BackendBundle\Entity\articulo $articuloId)
    {
        $this->articulo_id = $articuloId;
    }

    /**
     * Get articulo_id
     *
     * @return Siga21\BackendBundle\Entity\articulo
     */
    public function getArticuloId()
    {
        return $this->articulo_id;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set importe
     *
     * @param decimal $importe
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    /**
     * Get importe
     *
     * @return decimal 
     */
    public function getImporte()
    {
        return $this->importe;
    }
}