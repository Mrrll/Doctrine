<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag
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
    protected $name;
    /**
     * Many Tags have Many Articles.
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
     */
    private $articles;
    public function __construct()
    {
        $this->tags = new ArrayCollection();
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
     * Get the value of name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get many Tags have Many Articles.
     */
    public function getArticles()
    {
        return $this->articles->toArray();
    }

    /**
     * Set many Tags have Many Articles.
     *
     * @return  self
     */
    public function addArticles(Article $articles)
    {
        $this->articles[] = $articles;
        return $this;
    }
}