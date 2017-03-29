<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Usuario extends BaseUser
{
	/** 
	 * @ORM\Id
	 * @ORM\Column(type="integer", length=11) 
	 * @ORM\GeneratedValue
	 */
	protected $id; 

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
