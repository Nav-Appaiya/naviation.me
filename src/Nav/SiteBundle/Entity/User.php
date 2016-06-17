<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 17-06-16
 * Time: 12:10
 * Project: Naviation.me
 */
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 17-06-16
 * Time: 12:10
 * Project: Naviation.me
 */

namespace Nav\SiteBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}