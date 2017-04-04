<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Usuario;

class Usuarios extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$usuarios = array(
			array('username' => 'Fulano Uno', 'email' => '1@b.c', 'password' => '1234'),
			array('username' => 'Fulano Dos', 'email' => '2@b.c', 'password' => '1234'),
			array('username' => 'Fulano Tres', 'email' => '3@b.c', 'password' => '1234'),
			array('username' => 'Fulano Cuatro', 'email' => '4@b.c', 'password' => '1234'),
			array('username' => 'Fulano Cinco', 'email' => '5@b.c', 'password' => '1234'),
			array('username' => 'Fulano Seis', 'email' => '6@b.c', 'password' => '1234'),
			array('username' => 'Fulano Siete', 'email' => '7@b.c', 'password' => '1234'),
			array('username' => 'Fulano Ocho', 'email' => '8@b.c', 'password' => '1234'),
			array('username' => 'Fulano Nueve', 'email' => '9@b.c', 'password' => '1234'),
		);
		$userAdmin = new Usuario();
        $userAdmin->setUsername('Manuel Anttuán');
        $userAdmin->setPlainPassword('1234');
        $userAdmin->setEmail('admin@yo.es');
        $userAdmin->setEnabled(true);
        $userAdmin->setSuperAdmin(true);

        $manager->persist($userAdmin);
        $manager->flush();
        //$this->createObjectSecurity($userAdmin);

		foreach ($usuarios as $usuario) {
			$entidad = new Usuario();
	        $entidad->setUsername($usuario['username']);
	        $entidad->setPlainPassword($usuario['password']);
	        $entidad->setEmail($usuario['email']);
	        $entidad->setEnabled(true);
	        $entidad->setSuperAdmin(false);

			$manager->persist($entidad);
		}
		$manager->flush();
	}
	public function getOrder()
    {
        return 10; // number in which order to load fixtures
    }
} 
