<?php


namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getAnyatt()
    {
        return $this->anyatt;
    }

    /**
     * @param mixed $anyatt
     */
    public function setAnyatt($anyatt)
    {
        $this->anyatt = $anyatt;
    }


    /**
     * @ORM\Column(type="string")
     */
    protected $anyatt;


    public function __construct()
    {
        parent::__construct();

    }
}