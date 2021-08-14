<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\MappedSuperclass */
class MappedSuperclassBase
{
    /** @ORM\Column(type="integer") */
    protected $mapped1;
    /** @ORM\Column(type="string") */
    protected $mapped2;
    /**
     * @ORM\OneToOne(targetEntity="EntitySubClass")
     * @ORM\JoinColumn(name="related1_id", referencedColumnName="id")
     */
    protected $mappedRelated1;

    // ... more fields and methods

    /**
     * Get the value of mapped1
     */
    public function getMapped1()
    {
        return $this->mapped1;
    }

    /**
     * Set the value of mapped1
     *
     * @return  self
     */
    public function setMapped1($mapped1)
    {
        $this->mapped1 = $mapped1;

        return $this;
    }

    /**
     * Get the value of mapped2
     */
    public function getMapped2()
    {
        return $this->mapped2;
    }

    /**
     * Set the value of mapped2
     *
     * @return  self
     */
    public function setMapped2($mapped2)
    {
        $this->mapped2 = $mapped2;

        return $this;
    }

    /**
     * Get the value of mappedRelated1
     */
    public function getMappedRelated1()
    {
        return $this->mappedRelated1;
    }

    /**
     * Set the value of mappedRelated1
     *
     * @return  self
     */
    public function addMappedRelated1(EntitySubClass $mappedRelated1)
    {
        $this->mappedRelated1 = $mappedRelated1;
        return $this;
    }
}