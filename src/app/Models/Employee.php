<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Employee extends Person
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $job;
    /**
     * Get the value of job
     *
     * @return  string
     */
    public function getJob()
    {
        return $this->job;
    }
    /**
     * Set the value of job
     *
     * @param  string  $job
     *
     * @return  self
     */
    public function setJob(string $job)
    {
        $this->job = $job;

        return $this;
    }
}