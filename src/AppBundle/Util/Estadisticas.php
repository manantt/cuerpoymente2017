<?php
namespace AppBundle\Util;

class Estadisticas
{
	/**
	 * Medias individuales de usuario
	 * Devuelven la puntuación media de cada usuario, basada en las 10 últimas puntuaciones en todos los ejercicios
	 */
	public function getMedia($em, $usuario, $capacidad){
		$resultado = 0;
		$ejercicios = $em->getRepository('AppBundle:Ejercicio')->findBy(array());//todos los ejercicios

		foreach($ejercicios as $ejercicio){//por cada ejercicio
			$puntuaciones = $em->getRepository('AppBundle:Puntuacion')->findBy(//recojo las 10 últimas puntuaciones
				array('idUsuario' => $usuario, 'idEjercicio' => $ejercicio),
				array('fecha' => 'DESC'),
				10,
				0
			);
			$puntuacionEjercicio = 0;
			foreach ($puntuaciones as $puntuacion) {
				switch ($capacidad) {
					case 'ejecucion':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getEjecucion();
						break;
					case 'atencion':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getAtencion();
						break;
					case 'memoria':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getMemoria();
						break;
					case 'percepcion':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getPercepcionyrapidez();
						break;
					case 'relajacion':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getRelajacion();
						break;
					case 'fuerza':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getFuerza();
						break;
					case 'resistencia':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getResistencia();
						break;
					case 'velocidad':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getVelocidad();
						break;
					case 'flexibilidad':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getFlexibilidad();
						break;
					case 'coordinacion':
						$puntuacionEjercicio += $puntuacion->getPuntuacion() * $ejercicio->getCoordinacion();
						break;
					default:
						# code...
						break;
				}
			}
			if($ejercicio->getTipo()->getNombre() == "juego")//si es un juego calculo la media
				$resultado += sizeof($puntuaciones)>0?$puntuacionEjercicio/sizeof($puntuaciones):0;
			else if($ejercicio->getTipo()->getNombre() == "entrenamiento")//si es un entrenamiento sumo la puntuacion
				$resultado += $puntuacionEjercicio;
		}
		return intval($resultado);
	}
	/**
	 * Máxima puntuación
	 * Devuelve la puntuación del usuario con mejor puntuación en ese área
	 */
	public function getMax($em, $capacidad){
		$resultado = 0;
		$usuarios = $em->getRepository('AppBundle:Usuario')->findBy(array());//todos los usuarios
		foreach($usuarios as $usuario){//por cada usuario
			$puntuacion = $this->getMedia($em, $usuario, $capacidad);//obtiene la media en la capacidad indicada
			if($puntuacion>$resultado)
				$resultado = $puntuacion;
		}
		return intval($resultado);
	}
	/**
	 * Devuelve la puntuación total de un usuario
	 */
	public function getPuntuacion($em, $usuario){
		$total = 0;
		$total += $this->getMedia($em, $usuario, "ejecucion");
		$total += $this->getMedia($em, $usuario, "atencion");
		$total += $this->getMedia($em, $usuario, "memoria");
		$total += $this->getMedia($em, $usuario, "percepcion");
		$total += $this->getMedia($em, $usuario, "relajacion");
		$total += $this->getMedia($em, $usuario, "fuerza");
		$total += $this->getMedia($em, $usuario, "resistencia");
		$total += $this->getMedia($em, $usuario, "velocidad");
		$total += $this->getMedia($em, $usuario, "flexibilidad");
		$total += $this->getMedia($em, $usuario, "coordinacion");
		return $total;
	}
	/**
	 * Devuelve la puntuación total de un usuario
	 */
	public function getTop10($em){
		$usuariosPuntuaciones = array();
		$usuarios = $em->getRepository('AppBundle:Usuario')->findBy(array());//todos los usuarios
		foreach($usuarios as $usuario){//por cada usuario
			$usuariosPuntuaciones[$usuario->getUsername()] = $this->getPuntuacion($em, $usuario);
		}
		arsort($usuariosPuntuaciones);//ordeno el array
		$usuariosPuntuaciones = array_slice($usuariosPuntuaciones, 0, 10);//me quedo con los primeros 10 elementos
		return $usuariosPuntuaciones;
	}
	/**
	 * Devuelve el número de ejercicios que ha completado el usuario
	 */
	public function getNumEjercicios($em, $usuario){
		$ejercicios = $em->getRepository('AppBundle:Puntuacion')->findBy(array('idUsuario' => $usuario));//todos los ejercicios de un usuario
		return sizeof($ejercicios);
	}
} 
