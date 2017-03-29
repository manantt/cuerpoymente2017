<?php
namespace AppBundle\Util;

class ContadorVisitas
{
	private $ruta;

	public function __construct($ruta)
	{
		$this->ruta = $ruta;
	}
	public function nuevaVisita()
	{
		$visitas = $this->getVisitas() + 1;
		file_put_contents(__DIR__.$this->ruta, $visitas);
	}
	public function getVisitas()
	{
		$visitas = file_get_contents(__DIR__.$this->ruta);
		return $visitas;
	}
} 
