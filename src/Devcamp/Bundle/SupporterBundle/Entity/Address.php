<?php

namespace Devcamp\Bundle\SupporterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="address")
 */
class Address
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // Doctrine2 Best Practices: Initialize collections in the constructor
        $this->supporters   = new ArrayCollection;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var array $supporters
     *
     * @ORM\OneToMany(targetEntity="SupporterAddress", mappedBy="address", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="supporters")
     */
    private $supporters;

    /**
     * @var boolean $share
     *
     * @ORM\Column(name="share", type="boolean", nullable=true)
     */
    private $share;

    /**
     * @var string $main_address
     *
     * @ORM\Column(name="main_address", type="string", length=100, nullable=true)
     */
    private $mainAddress;

    /**
     * @var string $extra_address
     *
     * @ORM\Column(name="extra_address", type="string", length=100, nullable=true)
     */
    private $extraAddress;

    /**
     * @var string $zip_code
     *
     * @ORM\Column(name="zip_code", type="string", length=15, nullable=true)
     */
    private $zipCode;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string $country
     *
     * @ORM\Column(name="country", type="string", length=10, nullable=true)
     */
    private $country;

    /**
     * @var string $phone_prefix
     *
     * @ORM\Column(name="phone_prefix", type="smallint", nullable=true)
     */
    private $phonePrefix;

    /**
     * @var string $phone_number
     *
     * @ORM\Column(name="phone_number", type="string", length=20, nullable=true)
     */
    private $phoneNumber;

    /////////////////////////////////////

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
     * Set share
     *
     * @param boolean $share
     * @return Address
     */
    public function setShare($share)
    {
        $this->share = $share;

        return $this;
    }

    /**
     * Get share
     *
     * @return boolean 
     */
    public function getShare()
    {
        return $this->share;
    }

    /**
     * Set mainAddress
     *
     * @param string $mainAddress
     * @return Address
     */
    public function setMainAddress($mainAddress)
    {
        $this->mainAddress = $mainAddress;

        return $this;
    }

    /**
     * Get mainAddress
     *
     * @return string 
     */
    public function getMainAddress()
    {
        return $this->mainAddress;
    }

    /**
     * Set extraAddress
     *
     * @param string $extraAddress
     * @return Address
     */
    public function setExtraAddress($extraAddress)
    {
        $this->extraAddress = $extraAddress;

        return $this;
    }

    /**
     * Get extraAddress
     *
     * @return string 
     */
    public function getExtraAddress()
    {
        return $this->extraAddress;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Address
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phonePrefix
     *
     * @param integer $phonePrefix
     * @return Address
     */
    public function setPhonePrefix($phonePrefix)
    {
        $this->phonePrefix = $phonePrefix;

        return $this;
    }

    /**
     * Get phonePrefix
     *
     * @return integer 
     */
    public function getPhonePrefix()
    {
        return $this->phonePrefix;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Address
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Add supporters
     *
     * @param \Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $supporters
     * @return Address
     */
    public function addSupporter(\Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $supporters)
    {
        $this->supporters[] = $supporters;

        return $this;
    }

    /**
     * Remove supporters
     *
     * @param \Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $supporters
     */
    public function removeSupporter(\Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress $supporters)
    {
        $this->supporters->removeElement($supporters);
    }

    /**
     * Get supporters
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSupporters()
    {
        return $this->supporters;
    }
}
