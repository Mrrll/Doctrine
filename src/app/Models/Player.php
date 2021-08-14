<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Player extends People
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $player;


    /**
     * Get the value of player
     *
     * @return  string
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set the value of player
     *
     * @param  string  $player
     *
     * @return  self
     */
    public function setPlayer(string $player)
    {
        $this->player = $player;

        return $this;
    }
}