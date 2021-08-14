<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
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
    // *: Agregaremos propiedades que almacenarán objetos de tipos de entidad específicos para modelar las relaciones entre diferentes entidades ...
    /**
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[] An ArrayCollection of Bug objects.
     */
    protected $reportedBugs;
    /**
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[] An ArrayCollection of Bug objects.
     */
    protected $assignedBugs;
    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
    /**
     * Many User have Many Phonenumbers.
     * @ORM\ManyToMany(targetEntity="Phonenumber")
     * @ORM\JoinTable(name="users_phonenumbers",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $phonenumbers;
    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Group")
     * @ORM\JoinTable(name="users_groups",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     *      )
     */
    private $groups;

    /**
     * Many Users have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * Many Users have many Users.
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;

    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
        $this->phonenumbers = new ArrayCollection();
        $this->groups = new ArrayCollection();
        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
    }
    // *:Implementar una referencia bidireccional ...

    public function addReportedBug(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug(Bug $bug)
    {
        $this->assignedBugs[] = $bug;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of address
     */
    public function Address()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Get many User have Many Phonenumbers.
     */
    public function getPhonenumbers()
    {
        return $this->phonenumbers->toArray(); // !: toArray() muy importante ....
    }

    /**
     * Set many User have Many Phonenumbers.
     *
     * @return  self
     */
    public function addPhonenumbers(Phonenumber $phonenumbers)
    {
        $this->phonenumbers[] = $phonenumbers;
        return $this;
    }

    /**
     * Get many Users have Many Groups.
     */
    public function getGroups()
    {
        return $this->groups->toArray();
    }

    /**
     * Set many Users have Many Groups.
     *
     * @return  self
     */
    public function addGroups(Group $groups)
    {
        $this->groups->add($groups);
        return $this;
    }

    /**
     * Get many Users have Many Users.
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe->toArray();
    }

    /**
     * Set many Users have Many Users.
     *
     * @return  self
     */
    public function addFriendsWithMe(User $friendsWithMe)
    {
        $this->friendsWithMe->add($friendsWithMe);

        return $this;
    }

    /**
     * Get many Users have many Users.
     */
    public function getMyFriends()
    {
        return $this->myFriends->toArray();
    }

    /**
     * Set many Users have many Users.
     *
     * @return  self
     */
    public function addMyFriends(User $myFriends)
    {
        $myFriends->addFriendsWithMe($this);
        $this->myFriends->add($myFriends);
        return $this;
    }
}
