<?php

namespace Devcamp\Bundle\PlayerBundle\Entity;

use Devcamp\Bundle\CoreBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Devcamp\Bundle\PlayerBundle\Entity\PlayerRepository")
 */
final class Player extends User
{
    public function __construct() {

        $this->health = new Health();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="team", type="string", length=255, nullable=true)
     */
    private $team;

    /**
     * @ORM\OneToOne(targetEntity="Devcamp\Bundle\PlayerBundle\Entity\Health", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="health")
     */
    private $health;

    ///////////////////////////////// GETTERS AND SETTERS //////////////////////////////////////////////

    /**
     * Set team
     *
     * @param string $team
     * @return Player
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return string 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set health
     *
     * @param \Devcamp\Bundle\PlayerBundle\Entity\Health $health
     * @return Player
     */
    public function setHealth(\Devcamp\Bundle\PlayerBundle\Entity\Health $health = null)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get health
     *
     * @return \Devcamp\Bundle\PlayerBundle\Entity\Health 
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return array("ROLE_PLAYER", "ROLE_USER");
    }
}
