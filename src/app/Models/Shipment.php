<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shipments")
 */
class Shipment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    */
    protected $id;
    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $date;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of date
     *
     * @return  \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @param  \DateTime  $date
     *
     * @return  self
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }
}
