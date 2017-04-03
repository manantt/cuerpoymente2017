<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class TipoEjercicios
{
	/** 
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11)
	 */
	protected $id; 

	/** @ORM\Column(type="string", length=100) */
    protected $nombre; 

    /** @ORM\Column(type="string", length=100) */
    protected $descripcion; 

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TipoEjercicios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return TipoEjercicios
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
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
     * Set id
     *
     * @param integer $id
     *
     * @return TipoEjercicios
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
