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
        // $this->get('miservicio.contadorvisitas')->getVisitas();
        $this->get('miservicio.contadorvisitas')->nuevaVisita();

        $em = $this->getDoctrine()->getManager();
		$categorias = $em->getRepository('AppBundle:Categoria')->findBy(array('idPadre' => NULL));
		
		return $this->render('base.html.twig', array('categorias' => $categorias,
			'visitas' => $this->get('miservicio.contadorvisitas')->getVisitas()));
    }
    /**
     * @Route("/categoria/{idCategoria}/{pag}/", name="categoria")
     */
    public function categoriaAction($idCategoria, $pag, Request $request)
    {
        $this->get('miservicio.contadorvisitas')->nuevaVisita();
        
        $fichasPorPagina = 10;
        $addCoockie = false;
        if($request->cookies->has('fichasPorPagina'))
        	$fichasPorPagina = $request->cookies->get('fichasPorPagina');
        if($request->request->has('paginacion')){
        	$addCoockie = true;
        	$fichasPorPagina = $request->request->get('paginacion');
        }

        $em = $this->getDoctrine()->getManager();
		$categorias = $em->getRepository('AppBundle:Categoria')->findBy(array('idPadre' => NULL));
		$fichas = $em->getRepository('AppBundle:Ficha')->findBy(
			array('categoria' => $idCategoria),
			array('tipoFicha' => 'ASC'),
			$fichasPorPagina,
			($pag-1)*10
		);
		
		$response = $this->render('categoria.html.twig', array(
				'categorias' => $categorias,
				'fichas' => $fichas,
				'idCategoria' => $idCategoria,
				'pagina' => $pag,
				'fichasPorPagina' => $fichasPorPagina,
			'visitas' => $this->get('miservicio.contadorvisitas')->getVisitas()
			)
		);
		if($addCoockie){
			$response->headers->setCookie(new Cookie("fichasPorPagina", $request->request->get('paginacion')));
		}
		return $response;
    }
    /**
     * @Route("/ficha/{idFicha}", name="ficha")
     */
    public function fichaAction($idFicha)
    {
        $this->get('miservicio.contadorvisitas')->nuevaVisita();
        
        $em = $this->getDoctrine()->getManager();
		$categorias = $em->getRepository('AppBundle:Categoria')->findBy(array('idPadre' => NULL));
		$ficha = $em->getRepository('AppBundle:Ficha')->findOneBy(array('id' => $idFicha));
		
		return $this->render('ficha.html.twig', array(
			'categorias' => $categorias,
			'ficha' => $ficha,
			'visitas' => $this->get('miservicio.contadorvisitas')->getVisitas()
		));
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
