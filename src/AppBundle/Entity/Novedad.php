<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Novedad
{
	/** 
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11)
	 */
	protected $id; 

	/** @ORM\Column(type="datetime", length=100) */
    protected $fecha; 

    /** @ORM\Column(type="string", length=100) */
    protected $contenido; 

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Novedad
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set fecha
     *
     * @param string $fecha
     *
     * @return Novedad
     */
    public function setFecha($fecha)
    {
        $this->fecha = new \DateTime($fecha);

        return $this;
    }

    /**
     * Get fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     *
     * @return Novedad
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }
}
