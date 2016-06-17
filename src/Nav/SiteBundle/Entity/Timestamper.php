<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 17-06-16
 * Time: 13:02
 * Project: Naviation.me
 */

namespace Nav\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TimestampableEntity
 * @package Nav\SiteBundle\Entity
 *
 * Extendable abstract class for giving other entities
 * a perfect update/create timestamp column.
 * Also intercepts the prepersist and updates updated time accordingly.
 */
abstract class Timestamper
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $modified_at;
    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    /**
     * @param mixed
     *
     * @return self
     */
    protected function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }
    /**
     * @param mixed $modified_at the modified at
     *
     * @return self
     */
    protected function setModifiedAt($modified_at)
    {
        $this->modified_at = $modified_at;
        return $this;
    }
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->setModifiedAt(new \DateTime());
        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime());
        }
    }
    /**
     * @ORM\PreFlush()
     */
    public function setCreatedAtValue()
    {
        $this->created_at = new \DateTime();
    }
}
