<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Puntuacion;

class Puntuaciones  extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$puntuaciones = array(
			array('puntuacion' => 1, 'ejercicio' => 1, 'usuario' => 'Manuel Anttuán'),
			array('puntuacion' => 1, 'ejercicio' => 2, 'usuario' => 'Manuel Anttuán'),
			array('puntuacion' => 1, 'ejercicio' => 3, 'usuario' => 'Manuel Anttuán'),
			array('puntuacion' => 10, 'ejercicio' => 4, 'usuario' => 'Manuel Anttuán'),
			array('puntuacion' => 1, 'ejercicio' => 5, 'usuario' => 'Manuel Anttuán'),

			array('puntuacion' => 1, 'ejercicio' => 1, 'usuario' => 'Fulano Uno'),
			array('puntuacion' => 1, 'ejercicio' => 2, 'usuario' => 'Fulano Uno'),
			array('puntuacion' => 1, 'ejercicio' => 3, 'usuario' => 'Fulano Uno'),
			array('puntuacion' => 1, 'ejercicio' => 4, 'usuario' => 'Fulano Uno'),
			array('puntuacion' => 1, 'ejercicio' => 5, 'usuario' => 'Fulano Uno'),

			array('puntuacion' => 1, 'ejercicio' => 1, 'usuario' => 'Fulano Dos'),
			array('puntuacion' => 1, 'ejercicio' => 2, 'usuario' => 'Fulano Dos'),
			array('puntuacion' => 1, 'ejercicio' => 3, 'usuario' => 'Fulano Dos'),
			array('puntuacion' => 1, 'ejercicio' => 4, 'usuario' => 'Fulano Dos'),

			array('puntuacion' => 1, 'ejercicio' => 1, 'usuario' => 'Fulano Tres'),
			array('puntuacion' => 1, 'ejercicio' => 2, 'usuario' => 'Fulano Tres'),
			array('puntuacion' => 1, 'ejercicio' => 3, 'usuario' => 'Fulano Tres'),

			array('puntuacion' => 1, 'ejercicio' => 1, 'usuario' => 'Fulano Cuatro'),
			array('puntuacion' => 1, 'ejercicio' => 2, 'usuario' => 'Fulano Cuatro'),

			array('puntuacion' => 1, 'ejercicio' => 1, 'usuario' => 'Fulano Cinco'),

			array('puntuacion' => 1, 'ejercicio' => 2, 'usuario' => 'Fulano Seis'),

			array('puntuacion' => 1, 'ejercicio' => 3, 'usuario' => 'Fulano Siete'),








		);
		foreach ($puntuaciones as $puntuacion) {
			$entidad = new Puntuacion();
			$entidad->setPuntuacion($puntuacion['puntuacion']);

			$entidad->setIdEjercicio($manager->getReference('AppBundle:Ejercicio', $puntuacion['ejercicio']));
			$entidad->setIdUsuario($manager->getRepository('AppBundle:Usuario')->findOneBy(array('username' => $puntuacion['usuario'])));

			$manager->persist($entidad);
		}
		$manager->flush();
	}
	public function getOrder()
    {
        return 11; // number in which order to load fixtures
    }
} 
