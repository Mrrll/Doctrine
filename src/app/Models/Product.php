<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
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
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Feature", mappedBy="product")
     */
    private $features;

    public function __construct() {
        $this->features = new ArrayCollection();
    }
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

    /**
     * Get one product has many features. This is the inverse side.
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set one product has many features. This is the inverse side.
     *
     * @return  self
     */
    public function addFeatures(Feature $features)
    {
        $this->features[] = $features;
        $features->setProduct($this);
        return $this;
    }
}
