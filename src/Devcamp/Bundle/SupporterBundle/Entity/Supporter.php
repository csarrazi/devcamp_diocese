<?php

namespace Devcamp\Bundle\SupporterBundle\Entity;

use Devcamp\Bundle\CoreBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Supporter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Devcamp\Bundle\SupporterBundle\Entity\SupporterRepository")
 */
final class Supporter extends User
{
    /**
     * @var string
     *
     * @ORM\Column(name="tribune", type="string", length=255, nullable=true)
     */
    private $tribune;

    /**
     * @var array $addresses
     *
     * @ORM\OneToMany(targetEntity="SupporterAddress", mappedBy="supporter", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="addresses")
     */
    private $addresses;

    ///////////////////////////////

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set tribune
     *
     * @param string $tribune
     * @return Supporter
     */
    public function setTribune($tribune)
    {
        $this->tribune = $tribune;

        return $this;
    }

    /**
     * Get tribune
     *
     * @return string 
     */
    public function getTribune()
    {
        return $this->tribune;
    }

    /**
     * Add addresses
     *
     * @param \Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $addresses
     * @return Supporter
     */
    public function addAddress(\Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $addresses
     */
    public function removeAddress(\Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return array("ROLE_SUPPORTER", "ROLE_USER");
    }
}
