<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Seccion;
class Secciones implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$secciones = array(
			array('id' => 1, 'nombre' => 'Cuerpo','descripcion' => 'Capacidades físicas'),
			array('id' => 2, 'nombre' => 'Mente','descripcion' => 'Capacidades mentales'),
		);
		foreach ($secciones as $seccion) {
			$entidad = new Seccion();
			$entidad->setId($seccion['id']);
			$entidad->setNombre($seccion['nombre']);
			$entidad->setDescripcion($seccion['descripcion']);
			$manager->persist($entidad);
		}
		$manager->flush();
	}
} 
