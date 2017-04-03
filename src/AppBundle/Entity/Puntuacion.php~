<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Puntuacion
{
	/** 
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11)
     * ORM\GeneratedValue
	 */
	protected $id; 

	/** @ORM\Column(type="integer", length=20) */
    protected $puntuacion; 

	/** @ORM\ManyToMany(targetEntity="AppBundle\Entity\Ejercicio") */
    protected $idEjercicio;

    /** @ORM\ManyToMany(targetEntity="AppBundle\Entity\Usuario") */
    protected $idUsuario;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEjercicio = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUsuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Puntuacion
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
     * Set puntuacion
     *
     * @param integer $puntuacion
     *
     * @return Puntuacion
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * Get puntuacion
     *
     * @return integer
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Add idEjercicio
     *
     * @param \AppBundle\Entity\Ejercicio $idEjercicio
     *
     * @return Puntuacion
     */
    public function addIdEjercicio(\AppBundle\Entity\Ejercicio $idEjercicio)
    {
        $this->idEjercicio[] = $idEjercicio;

        return $this;
    }

    /**
     * Remove idEjercicio
     *
     * @param \AppBundle\Entity\Ejercicio $idEjercicio
     */
    public function removeIdEjercicio(\AppBundle\Entity\Ejercicio $idEjercicio)
    {
        $this->idEjercicio->removeElement($idEjercicio);
    }

    /**
     * Get idEjercicio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdEjercicio()
    {
        return $this->idEjercicio;
    }

    /**
     * Add idUsuario
     *
     * @param \AppBundle\Entity\Usuario $idUsuario
     *
     * @return Puntuacion
     */
    public function addIdUsuario(\AppBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario[] = $idUsuario;

        return $this;
    }

    /**
     * Remove idUsuario
     *
     * @param \AppBundle\Entity\Usuario $idUsuario
     */
    public function removeIdUsuario(\AppBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario->removeElement($idUsuario);
    }

    /**
     * Get idUsuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
