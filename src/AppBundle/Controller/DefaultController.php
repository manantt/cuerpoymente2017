<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Puntuacion;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
    {
	    if($request->query->get('puntuacion')){//guarda la puntuación en un ejercicio
	    	$em = $this->getDoctrine()->getManager();
			$puntuacion = new Puntuacion();
			$ejercicio = $em->getRepository('AppBundle:Ejercicio')->findOneBy(array('id' => $request->query->get('id')));
	    	$puntuacion->setIdEjercicio($ejercicio);
	    	$puntuacion->setIdUsuario($this->getUser());
	    	$puntuacion->setPuntuacion($request->query->get('puntuacion'));
	    	$em->persist($puntuacion);
			$em->flush();
	    	//return new response("guardado");
	    }
	    return $this->redirect("/".$request->getLocale(), 301);//redirige a la portada
    }
    /**
     * @Route("/", name="portada")
     */
    public function portadaAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$usuarioActual = $this->getUser();
    	/* Capacidades Mentales */
    	$miEjecucion = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "ejecucion");
    	$miAtencion = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "atencion");
    	$miMemoria = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "memoria");
    	$miPercepcion = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "percepcion");
    	$miRelajacion = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "relajacion");

    	$maxEjecucion = $this->get('miservicio.estadisticas')->getMax($em, "ejecucion");
    	$maxAtencion = $this->get('miservicio.estadisticas')->getMax($em, "atencion");
    	$maxMemoria = $this->get('miservicio.estadisticas')->getMax($em, "memoria");
    	$maxPercepcion = $this->get('miservicio.estadisticas')->getMax($em, "percepcion");
    	$maxRelajacion = $this->get('miservicio.estadisticas')->getMax($em, "relajacion");

    	$porcentajeEjecucion = $maxEjecucion > 0 ?  ($miEjecucion * 100) / $maxEjecucion : 0;
    	$porcentajeAtencion = $maxAtencion > 0 ? ($miAtencion * 100) / $maxAtencion : 0;
    	$porcentajeMemoria = $maxMemoria > 0 ? ($miMemoria * 100) / $maxMemoria : 0;
    	$porcentajePercepcion = $maxPercepcion > 0 ? ($miPercepcion * 100) / $maxPercepcion : 0;
    	$porcentajeRelajacion = $maxRelajacion > 0 ? ($miRelajacion * 100) / $maxRelajacion : 0;
    	 
    	 /* Capacidades Físicas */
    	$miFuerza = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "fuerza");
    	$miVelocidad = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "velocidad");
    	$miResistencia = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "resistencia");
    	$miFlexibilidad = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "flexibilidad");
    	$miCoordinacion = $this->get('miservicio.estadisticas')->getMedia($em, $usuarioActual, "coordinacion");

    	$maxFuerza = $this->get('miservicio.estadisticas')->getMax($em, "fuerza");
    	$maxVelocidad = $this->get('miservicio.estadisticas')->getMax($em, "velocidad");
    	$maxResistencia = $this->get('miservicio.estadisticas')->getMax($em, "resistencia");
    	$maxFlexibilidad = $this->get('miservicio.estadisticas')->getMax($em, "flexibilidad");
    	$maxCoordinacion = $this->get('miservicio.estadisticas')->getMax($em, "coordinacion");

    	$porcentajeFuerza = $maxFuerza > 0 ?  ($miFuerza * 100) / $maxFuerza : 0;
    	$porcentajeVelocidad = $maxVelocidad > 0 ?  ($miVelocidad * 100) / $maxVelocidad : 0;
    	$porcentajeResistencia = $maxResistencia > 0 ?  ($miResistencia * 100) / $maxResistencia : 0;
    	$porcentajeFlexibilidad = $maxFlexibilidad > 0 ?  ($miFlexibilidad * 100) / $maxFlexibilidad : 0;
    	$porcentajeCoordinacion = $maxCoordinacion > 0 ?  ($miCoordinacion * 100) / $maxCoordinacion : 0;
    	
    	/* TOP10 */
    	$top10 = $this->get('miservicio.estadisticas')->getTop10($em);
    	
    	$top1 = array_values($top10)[0];

    	/* Total */
    	$miPuntuacion = $miEjecucion + $miAtencion + $miMemoria + $miPercepcion + $miRelajacion + 
    		$miFuerza + $miVelocidad + $miResistencia + $miFlexibilidad + $miCoordinacion;

    	$porcenjajePuntuacion = $top1 > 0 ? ($miPuntuacion * 100 ) / $top1 : 0;
    	$numEjercicios = $this->get('miservicio.estadisticas')->getNumEjercicios($em, $usuarioActual);
    	 

		return $this->render('portada.html.twig', array(
				//mentales
				'ejecucion' => $miEjecucion,
				'atencion' => $miAtencion,
				'memoria' => $miMemoria,
				'percepcion' => $miPercepcion,
				'relajacion' => $miRelajacion,
				'porcentajeEjecucion' => $porcentajeEjecucion,
				'porcentajeAtencion' => $porcentajeAtencion,
				'porcentajeMemoria' => $porcentajeMemoria,
				'porcentajePercepcion' => $porcentajePercepcion,
				'porcentajeRelajacion' => $porcentajeRelajacion,
				//fisicas
				'fuerza' => $miFuerza,
				'velocidad' => $miVelocidad,
				'resistencia' => $miResistencia,
				'flexibilidad' => $miFlexibilidad,
				'coordinacion' => $miCoordinacion,
				'porcentajeFuerza' => $porcentajeFuerza,
				'porcentajeVelocidad' => $porcentajeVelocidad,
				'porcentajeResistencia' => $porcentajeResistencia,
				'porcentajeFlexibilidad' => $porcentajeFlexibilidad,
				'porcentajeCoordinacion' => $porcentajeCoordinacion,
				//total
				'total' => $miPuntuacion,
				'porcentajeTotal' => $porcenjajePuntuacion,
				'top10' => $top10,
				'numEjercicios' => $numEjercicios,
			)
		);
    }
    /**
     * @Route("/perfil", name="perfil")
     */
    public function perfilAction(Request $request)
    {
		if($this->getUser())
			return $this->render('perfil.html.twig');
		else
			return $this->redirect("/login", 301);
    }
    /**
     * @Route("/entrenamiento/{idEjercicio}", name="entrenamiento")
     */
    public function entrenamientoAction(Request $request, $idEjercicio = "")
    {
		//no está logueado
		if(!$this->getUser())
			return $this->redirect("/login", 301);

		$em = $this->getDoctrine()->getManager();
		//Ficha ejercicio
		$ejercicio = $em->getRepository('AppBundle:Ejercicio')->findOneBy(array('id' => $idEjercicio));
		if($idEjercicio != ""){
			return $this->render('ejercicio.html.twig', array(
			'ejercicio' => $ejercicio,
			/*'padre' => $padre,*/
			)
		);
		}
		//lista ejercicios
		$ejerciciosCuerpo = $em->getRepository('AppBundle:Ejercicio')->findBy(array('seccion' => 1));
		$ejerciciosMente = $em->getRepository('AppBundle:Ejercicio')->findBy(array('seccion' => 2));
		return $this->render('entrenamiento.html.twig', array(
			'ejerciciosCuerpo' => $ejerciciosCuerpo,
			'ejerciciosMente' => $ejerciciosMente,
			)
		);
    }
    /**
     * @Route("/tienda", name="tienda")
     */
    public function tiendaAction(Request $request)
    {
		return $this->render('tienda.html.twig');
    }
	/**
	* @Route("/logout", name="usuario_logout")
	*/
	public function logoutAction()
	{
		// el logout lo hace Symfony automáticamente
	}
}
