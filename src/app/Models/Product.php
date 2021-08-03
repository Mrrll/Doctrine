<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * One Product has One Shipment.
     * @ORM\OneToOne(targetEntity="Shipment")
     * @ORM\JoinColumn(name="shipment_id", referencedColumnName="id")
     */
    private $shipment;
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get one Product has One Shipment.
     */
    public function Shipment()
    {
        return $this->shipment;
    }

    /**
     * Set one Product has One Shipment.
     *
     * @return  self
     */
    public function setShipment(Shipment $shipment)
    {
        $this->shipment = $shipment;
    }
}
