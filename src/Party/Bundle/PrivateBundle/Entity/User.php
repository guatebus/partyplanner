<?php

namespace Party\Bundle\PrivateBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * ORM mapping requires this be a property on this class
     *
     * @var integer
     */
    protected $id;

}
