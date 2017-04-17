<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Ejercicio;

class Ejercicios  extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$ejercicios = array(
			array('id' => 1, 'nombre' => 'Calentamiento', 'duracion' => '2:00', 'ruta' => 'Lx4YFmORsWc',
						'descripcion' => 'Correr y estirar blablabla...',  
						'beneficios' => 'lalalala lalalaa',
						'seccion' => 1, 'tipo' => 2,
						'fuerza' => 0, 'velocidad' => 0, 'resistencia' => 5, 'flexibilidad' => 10, 'coordinacion' => 2,
						'ejecucion' => 0, 'atencion' => 0, 'memoria' => 0, 'percepcionyrapidez' => 0, 'relajacion' => 0),
			array('id' => 2, 'nombre' => 'Flexiones', 'duracion' => '2:00', 'ruta' => '2ZSq1BRYwAI',
						'descripcion' => 'Hacer flexiones blablabla...',  
						'beneficios' => 'lalalala lalalaa',
						'seccion' => 1, 'tipo' => 2,
						'fuerza' => 10, 'velocidad' => 0, 'resistencia' => 5, 'flexibilidad' => 0, 'coordinacion' => 1,
						'ejecucion' => 0, 'atencion' => 0, 'memoria' => 0, 'percepcionyrapidez' => 0, 'relajacion' => 0),
			array('id' => 3, 'nombre' => 'Sentadillas', 'duracion' => '2:00',  'ruta' => 'en2ulvjSqUc',
						'descripcion' => 'Hacer sentadillas blablabla...', 
						'beneficios' => 'lalalala lalalaa',
						'seccion' => '1', 'tipo' => '2',
						'fuerza' => 10, 'velocidad' => 0, 'resistencia' => 5, 'flexibilidad' => 0, 'coordinacion' => 1,
						'ejecucion' => 0, 'atencion' => 0, 'memoria' => 0, 'percepcionyrapidez' => 0, 'relajacion' => 0),
			array('id' => 4, 'nombre' => 'Bacteriófago', 'duracion' => '1:00',  'ruta' => 'bacteriofago',
						'descripcion' => 'Juego que consiste en blablabla...', 
						'beneficios' => 'lalalala lalalaa',
						'seccion' => '2', 'tipo' => '1',
						'fuerza' => 0, 'velocidad' => 0, 'resistencia' => 0, 'flexibilidad' => 0, 'coordinacion' => 0,
						'ejecucion' => 9, 'atencion' => 6, 'memoria' => 0, 'percepcionyrapidez' => 6, 'relajacion' => 0),
			array('id' => 5, 'nombre' => 'Sprint', 'duracion' => '1:00',  'ruta' => 'Eu00VOHXGAU',
						'descripcion' => 'Correr blablabla...', 
						'beneficios' => 'lalalala lalalaa',
						'seccion' => '1', 'tipo' => '2',
						'fuerza' => 0, 'velocidad' => 9, 'resistencia' => 6, 'flexibilidad' => 0, 'coordinacion' => 2,
						'ejecucion' => 0, 'atencion' => 0, 'memoria' => 0, 'percepcionyrapidez' => 0, 'relajacion' => 0),
		);
		foreach ($ejercicios as $ejercicio) {
			$entidad = new Ejercicio();
			$entidad->setId($ejercicio['id']);
			$entidad->setNombre($ejercicio['nombre']);
			$entidad->setDescripcion($ejercicio['descripcion']);
			$entidad->setBeneficios($ejercicio['beneficios']);
			$entidad->setDuracion($ejercicio['duracion']);
			$entidad->setRuta($ejercicio['ruta']);
			$entidad->setFuerza($ejercicio['fuerza']);
			$entidad->setVelocidad($ejercicio['velocidad']);
			$entidad->setResistencia($ejercicio['resistencia']);
			$entidad->setFlexibilidad($ejercicio['flexibilidad']);
			$entidad->setCoordinacion($ejercicio['coordinacion']);
			$entidad->setEjecucion($ejercicio['ejecucion']);
			$entidad->setAtencion($ejercicio['atencion']);
			$entidad->setMemoria($ejercicio['memoria']);
			$entidad->setPercepcionyrapidez($ejercicio['percepcionyrapidez']);
			$entidad->setRelajacion($ejercicio['relajacion']);

			$entidad->setSeccion($manager->getReference('AppBundle:Seccion', $ejercicio['seccion']));
			$entidad->setTipo($manager->getReference('AppBundle:TipoEjercicios', $ejercicio['tipo']));

			$manager->persist($entidad);
		}
		$manager->flush();
	}
	public function getOrder()
    {
        return 10; // number in which order to load fixtures
    }
} 
