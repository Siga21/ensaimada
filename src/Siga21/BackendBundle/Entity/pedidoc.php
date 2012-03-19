<?php

namespace Siga21\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siga21\BackendBundle\Entity\pedidoc
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Siga21\BackendBundle\Entity\pedidocRepository")
 */
class pedidoc
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
      * @ORM\ManyToOne(targetEntity="Siga21\BackendBundle\Entity\cliente")
      */
    private $cliente_id;
    /** 
      * @ORM\ManyToOne(targetEntity="Siga21\BackendBundle\Entity\tienda")
      */
    private $tienda_id;

    /**
     * @var date $fecha
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var date $fecha_entrega
     *
     * @ORM\Column(name="fecha_entrega", type="date")
     */
    private $fecha_entrega;

    /**
     * @var decimal $importe
     *
     * @ORM\Column(name="importe", type="decimal", scale=2)
     */
    private $importe;

    /**
     * @var string $observaciones
     *
     * @ORM\Column(name="observaciones", type="string", length=150)
     */
    private $observaciones;


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
     * Set cliente_id
     *
     * @param Siga21\BackendBundle\Entity\cliente $clienteId
     */
    public function setClienteId(\Siga21\BackendBundle\Entity\cliente $clienteId)
    {
        $this->cliente_id = $clienteId;
    }

    /**
     * Get cliente_id
     *
     * @return Siga21\BackendBundle\Entity\cliente 
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    /**
     * Set tienda_id
     *
     * @param Siga21\BackendBundle\Entity\tienda $tiendaId
     */
    public function setTiendaId(\Siga21\BackendBundle\Entity\tienda $tiendaId)
    {
        $this->tienda_id = $tiendaId;
    }

    /**
     * Get tienda_id
     *
     * @return Siga21\BackendBundle\Entity\tienda 
     */
    public function getTiendaId()
    {
        return $this->tienda_id;
    }

    /**
     * Set fecha
     *
     * @param date $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return date 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set fecha_entrega
     *
     * @param date $fechaEntrega
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fecha_entrega = $fechaEntrega;
    }

    /**
     * Get fecha_entrega
     *
     * @return date 
     */
    public function getFechaEntrega()
    {
        return $this->fecha_entrega;
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

    /**
     * Set observaciones
     *
     * @param string $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    
    public function __toString()
    {
        return $this->getId();
    }
}