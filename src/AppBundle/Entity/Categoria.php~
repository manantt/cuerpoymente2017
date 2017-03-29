<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Categoria
{
	/** 
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11)
	 */
	protected $id; 

	/** @ORM\Column(type="string", length=100) */
	protected $nombre; 

	/** @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categoria") */
	protected $idPadre;

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
     * @return Categoria
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
     * Set idPadre
     *
     * @param \AppBundle\Entity\Categoria $idPadre
     *
     * @return Categoria
     */
    public function setIdPadre(\AppBundle\Entity\Categoria $idPadre = null)
    {
        $this->idPadre = $idPadre;

        return $this;
    }

    /**
     * Get idPadre
     *
     * @return \AppBundle\Entity\Categoria
     */
    public function getIdPadre()
    {
        return $this->idPadre;
    }

    public function __toString()
	{
		return $this->getNombre();
	}

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Categoria
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
