<?php

namespace Party\Bundle\PrivateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $parties;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parties = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add party
     *
     * @param  \ERunner\Bundle\FinBackEndBundle\Entity\Party $party
     * @return Tag
     */
    public function addParty(\ERunner\Bundle\FinBackEndBundle\Entity\Party $party)
    {
        $this->parties[] = $party;

        return $this;
    }

    /**
     * Remove party
     *
     * @param \ERunner\Bundle\FinBackEndBundle\Entity\Party $party
     */
    public function removeParty(\ERunner\Bundle\FinBackEndBundle\Entity\Party $party)
    {
        $this->parties->removeElement($party);
    }

    /**
     * Get parties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParties()
    {
        return $this->parties;
    }

}
