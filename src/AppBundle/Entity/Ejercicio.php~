<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Ejercicio
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

    /** @ORM\Column(type="string", length=100) */
    protected $beneficios; 

    /** @ORM\Column(type="string", length=100) */
    protected $duracion; 

    /** @ORM\Column(type="string", length=100) */
    protected $ruta; 

    /** @ORM\Column(type="integer", length=3) */
    protected $fuerza;

    /** @ORM\Column(type="integer", length=3) */
    protected $velocidad;

    /** @ORM\Column(type="integer", length=3) */
    protected $resistencia;

    /** @ORM\Column(type="integer", length=3) */
    protected $flexibilidad;

    /** @ORM\Column(type="integer", length=3) */
    protected $coordinacion;

    /** @ORM\Column(type="integer", length=3) */
    protected $ejecucion;

    /** @ORM\Column(type="integer", length=3) */
    protected $atencion;

    /** @ORM\Column(type="integer", length=3) */
    protected $memoria;

    /** @ORM\Column(type="integer", length=3) */
    protected $percepcionyrapidez;

    /** @ORM\Column(type="integer", length=3) */
    protected $relajacion;

	/** @ORM\ManyToOne(targetEntity="AppBundle\Entity\TipoEjercicios") */
    protected $tipo;

    /** @ORM\ManyToOne(targetEntity="AppBundle\Entity\Seccion") */
    protected $seccion;

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
     * @return Ejercicio
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
     * @return Ejercicio
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
     * Set tipo
     *
     * @param \AppBundle\Entity\TipoEjercicios $tipo
     *
     * @return Ejercicio
     */
    public function setTipo(\AppBundle\Entity\TipoEjercicios $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \AppBundle\Entity\TipoEjercicios
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set seccion
     *
     * @param \AppBundle\Entity\Seccion $seccion
     *
     * @return Ejercicio
     */
    public function setSeccion(\AppBundle\Entity\Seccion $seccion = null)
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * Get seccion
     *
     * @return \AppBundle\Entity\Seccion
     */
    public function getSeccion()
    {
        return $this->seccion;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     *
     * @return Ejercicio
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Ejercicio
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set fuerza
     *
     * @param integer $fuerza
     *
     * @return Ejercicio
     */
    public function setFuerza($fuerza)
    {
        $this->fuerza = $fuerza;

        return $this;
    }

    /**
     * Get fuerza
     *
     * @return integer
     */
    public function getFuerza()
    {
        return $this->fuerza;
    }

    /**
     * Set velocidad
     *
     * @param integer $velocidad
     *
     * @return Ejercicio
     */
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;

        return $this;
    }

    /**
     * Get velocidad
     *
     * @return integer
     */
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    /**
     * Set resistencia
     *
     * @param integer $resistencia
     *
     * @return Ejercicio
     */
    public function setResistencia($resistencia)
    {
        $this->resistencia = $resistencia;

        return $this;
    }

    /**
     * Get resistencia
     *
     * @return integer
     */
    public function getResistencia()
    {
        return $this->resistencia;
    }

    /**
     * Set flexibilidad
     *
     * @param integer $flexibilidad
     *
     * @return Ejercicio
     */
    public function setFlexibilidad($flexibilidad)
    {
        $this->flexibilidad = $flexibilidad;

        return $this;
    }

    /**
     * Get flexibilidad
     *
     * @return integer
     */
    public function getFlexibilidad()
    {
        return $this->flexibilidad;
    }

    /**
     * Set coordinacion
     *
     * @param integer $coordinacion
     *
     * @return Ejercicio
     */
    public function setCoordinacion($coordinacion)
    {
        $this->coordinacion = $coordinacion;

        return $this;
    }

    /**
     * Get coordinacion
     *
     * @return integer
     */
    public function getCoordinacion()
    {
        return $this->coordinacion;
    }

    /**
     * Set ejecucion
     *
     * @param integer $ejecucion
     *
     * @return Ejercicio
     */
    public function setEjecucion($ejecucion)
    {
        $this->ejecucion = $ejecucion;

        return $this;
    }

    /**
     * Get ejecucion
     *
     * @return integer
     */
    public function getEjecucion()
    {
        return $this->ejecucion;
    }

    /**
     * Set atencion
     *
     * @param integer $atencion
     *
     * @return Ejercicio
     */
    public function setAtencion($atencion)
    {
        $this->atencion = $atencion;

        return $this;
    }

    /**
     * Get atencion
     *
     * @return integer
     */
    public function getAtencion()
    {
        return $this->atencion;
    }

    /**
     * Set memoria
     *
     * @param integer $memoria
     *
     * @return Ejercicio
     */
    public function setMemoria($memoria)
    {
        $this->memoria = $memoria;

        return $this;
    }

    /**
     * Get memoria
     *
     * @return integer
     */
    public function getMemoria()
    {
        return $this->memoria;
    }

    /**
     * Set percepcionyrapidez
     *
     * @param integer $percepcionyrapidez
     *
     * @return Ejercicio
     */
    public function setPercepcionyrapidez($percepcionyrapidez)
    {
        $this->percepcionyrapidez = $percepcionyrapidez;

        return $this;
    }

    /**
     * Get percepcionyrapidez
     *
     * @return integer
     */
    public function getPercepcionyrapidez()
    {
        return $this->percepcionyrapidez;
    }

    /**
     * Set relajacion
     *
     * @param integer $relajacion
     *
     * @return Ejercicio
     */
    public function setRelajacion($relajacion)
    {
        $this->relajacion = $relajacion;

        return $this;
    }

    /**
     * Get relajacion
     *
     * @return integer
     */
    public function getRelajacion()
    {
        return $this->relajacion;
    }

    /**
     * Set ruta
     *
     * @param string $ruta
     *
     * @return Ejercicio
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set beneficios
     *
     * @param string $beneficios
     *
     * @return Ejercicio
     */
    public function setBeneficios($beneficios)
    {
        $this->beneficios = $beneficios;

        return $this;
    }

    /**
     * Get beneficios
     *
     * @return string
     */
    public function getBeneficios()
    {
        return $this->beneficios;
    }
}
