<?php

namespace Siga21\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siga21\BackendBundle\Entity\articulo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Siga21\BackendBundle\Entity\articuloRepository")
 */
class articulo
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
     * @var integer $familia_id
     *
     * @ORM\Column(name="familia_id", type="integer")
     */
    private $familia_id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var decimal $precio
     *
     * @ORM\Column(name="precio", type="decimal", scale=2)
     */
    private $precio;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=150)
     */
    private $descripcion;

    /**
     * @var boolean $vigente
     *
     * @ORM\Column(name="vigente", type="boolean")
     */
    private $vigente;

    /**
     * @var integer $ean13
     *
     * @ORM\Column(name="ean13", type="integer")
     */
    private $ean13;

    /**
     * @var string $imagen
     *
     * @ORM\Column(name="imagen", type="string", length=50)
     */
    private $imagen;


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
     * Set familia_id
     *
     * @param integer $familiaId
     */
    public function setFamiliaId($familiaId)
    {
        $this->familia_id = $familiaId;
    }

    /**
     * Get familia_id
     *
     * @return integer 
     */
    public function getFamiliaId()
    {
        return $this->familia_id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio
     *
     * @param decimal $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get precio
     *
     * @return decimal 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set vigente
     *
     * @param boolean $vigente
     */
    public function setVigente($vigente)
    {
        $this->vigente = $vigente;
    }

    /**
     * Get vigente
     *
     * @return boolean 
     */
    public function getVigente()
    {
        return $this->vigente;
    }

    /**
     * Set ean13
     *
     * @param integer $ean13
     */
    public function setEan13($ean13)
    {
        $this->ean13 = $ean13;
    }

    /**
     * Get ean13
     *
     * @return integer 
     */
    public function getEan13()
    {
        return $this->ean13;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }
}
