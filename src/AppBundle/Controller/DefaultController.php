<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use AppBundle\Entity\Ficha;
use AppBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
    {
	    //return $this->forward('AppBundle:Default:index');
	    return $this->redirect("/".$request->getLocale(), 301);
    }
    /**
     * @Route("/", name="portada")
     */
    public function portadaAction(Request $request)
    {
		return $this->render('portada.html.twig');
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
	* @Route("/logdout", name="usuario_logout")
	*/
	public function logoutAction()
	{
		// el logout lo hace Symfony automáticamente
	}
	/**
	* @Route("/usuario/editar/{idFicha}/", name="editar")
	*/
	public function editarAction($idFicha = 2, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$categorias = $em->getRepository('AppBundle:Categoria')->findBy(array('idPadre' => NULL));
		$ficha = $em->getRepository('AppBundle:Ficha')->findOneBy(array('id' => $idFicha));

		//construir el formulario
		$formulario = $this->createFormBuilder($ficha)
			->add('titulo')
			->add('categoria')
			->add('calle')
			->add('codigoPostal')
			->add('ciudad')
			->add('provincia')
			->add('descripcion', TextareaType::class)
			->add('tipoFicha')
			->add('save', SubmitType::class, array('label' => 'Guardar'))
		->getForm();

		//submits
		$formulario->handleRequest($request);
	    if ($formulario->isSubmitted() && $formulario->isValid()) {
			$em->persist($ficha);
        	$em->flush();

	        return $this->redirect($this->generateUrl(
	            'ficha',
	            array('idFicha' => $idFicha)
	        ));
	    }
		//renderizar la plantilla
		return $this->render('usuario/editar.html.twig', array(
			'formulario' => $formulario->createView(),
			'ficha' => $ficha,
			'categorias' => $categorias,
			'visitas' => $this->get('miservicio.contadorvisitas')->getVisitas()
		));
	}
    // /**
    //  * @Route("/{nombrePagina}")
    //  */
    // public function defaultAction($nombrePagina)
    // {
    //     return new Response("<h1 style='text-align:center'>Página no encontrada<h1><h3 style='text-align:center'>/".$nombrePagina."/</h3>", 404);
    // }
}
