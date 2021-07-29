<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="BugRepository")
 * @ORM\Table(name="bugs")
 */
class Bug
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $created;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $status;

    // *: Agregaremos propiedades que almacenarán objetos de tipos de entidad específicos para modelar las relaciones entre diferentes entidades ...
    /**
     * @ORM\ManyToMany(targetEntity="Product")
     */
    protected $products;
    // *:Implementar una referencia bidireccional ...
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     */
    protected $engineer;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     */
    protected $reporter;
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
    public function setEngineer(User $engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    public function setReporter(User $reporter)
    {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getEngineer()
    {
        return $this->engineer;
    }

    public function getReporter()
    {
        return $this->reporter;
    }
    // *: Los errores hacen referencia a los productos mediante una relación unidireccional ManyToMany en la base de datos que apunta de errores a productos ...

    public function assignToProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
