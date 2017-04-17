<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Novedad;

class Novedades  extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$novedades = array(
			array(
				'id' => 1, 
				'fecha' => '28-3-2017', 
				'contenido' => 'Comenzado el proyecto Cuerpo y Mente.',
			),
			array(
				'id' => 2, 
				'fecha' => '29-3-2017', 
				'contenido' => 'Añadidas novedades.',
			),
			array(
				'id' => 3, 
				'fecha' => '31-3-2017', 
				'contenido' => 'Rediseñada la portada.',
			),
			array(
				'id' => 4, 
				'fecha' => '17-4-2017', 
				'contenido' => 'Actualizados ejercicios',
			),
		);
		foreach ($novedades as $novedad) {
			$entidad = new Novedad();
			$entidad->setId($novedad['id']);
			$entidad->setFecha($novedad['fecha']);
			$entidad->setContenido($novedad['contenido']);

			$manager->persist($entidad);
		}
		$manager->flush();
	}
	public function getOrder()
    {
        return 10; // number in which order to load fixtures
    }
} 
