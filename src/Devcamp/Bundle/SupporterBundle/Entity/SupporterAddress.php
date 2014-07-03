<?php

namespace Devcamp\Bundle\SupporterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="supporter_address")
 */
class SupporterAddress
{
    public function __construct()
    {
        $this->since    = new \DateTime("now", new \DateTimeZone("Europe/Paris"));
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="since", type="date", nullable=true)
     */
    private $since;

    /**
     * @var Supporter $supporter
     *
     * @ORM\ManyToOne(targetEntity="Supporter", inversedBy="addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="supporter", nullable=false)
     */
    private $supporter;

    /**
     * @var Address $address
     *
     * Do not use "remove" in the cascade because the domicile could be shared.
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="supporters", cascade={"persist"})
     * @ORM\JoinColumn(name="address", nullable=false)
     */
    private $address;

    ////////////////////////////////////////////

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set since
     *
     * @param \DateTime $since
     * @return SupporterAddress
     */
    public function setSince($since)
    {
        $this->since = $since;

        return $this;
    }

    /**
     * Get since
     *
     * @return \DateTime 
     */
    public function getSince()
    {
        return $this->since;
    }

    /**
     * Set supporter
     *
     * @param \Devcamp\Bundle\SupporterBundle\Entity\Supporter $supporter
     * @return SupporterAddress
     */
    public function setSupporter(\Devcamp\Bundle\SupporterBundle\Entity\Supporter $supporter)
    {
        $this->supporter = $supporter;

        return $this;
    }

    /**
     * Get supporter
     *
     * @return \Devcamp\Bundle\SupporterBundle\Entity\Supporter 
     */
    public function getSupporter()
    {
        return $this->supporter;
    }

    /**
     * Set address
     *
     * @param \Devcamp\Bundle\SupporterBundle\Entity\Address $address
     * @return SupporterAddress
     */
    public function setAddress(\Devcamp\Bundle\SupporterBundle\Entity\Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Devcamp\Bundle\SupporterBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }
}
