<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\CategoryRepository;
/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $title;

    /**
     * One Category has Many Categories.
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    private $children;

    /**
     * Many Categories have One Category.
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    public function __construct() {
        $this->children = new ArrayCollection();
    }


    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get one Category has Many Categories.
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set one Category has Many Categories.
     *
     * @return  self
     */
    public function addChildren(Category $children)
    {
        $this->children->add($children);

        return $this;
    }

    /**
     * Get many Categories have One Category.
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set many Categories have One Category.
     *
     * @return  self
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return  string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param  string  $title
     *
     * @return  self
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }
}