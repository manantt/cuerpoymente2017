<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TipoEjercicios;
class TiposEjercicios implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$tiposEjercicios = array(
			array('id' => 1, 'nombre' => 'juego', 'descripcion' => 'Minijuego en html5-canvas'),
			array('id' => 2, 'nombre' => 'entrenamiento', 'descripcion' => 'Ejercicios físicos para realizar en casa'),
		);
		foreach ($tiposEjercicios as $tipoEjercicios) {
			$entidad = new TipoEjercicios();
			$entidad->setId($tipoEjercicios['id']);
			$entidad->setNombre($tipoEjercicios['nombre']);
			$entidad->setDescripcion($tipoEjercicios['descripcion']);
			$manager->persist($entidad);
		}
		$manager->flush();
	}
} 
