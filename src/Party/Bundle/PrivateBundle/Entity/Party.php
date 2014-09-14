<?php

namespace Party\Bundle\PrivateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Party
 */
class Party
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $location;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $attendees;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attendees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Party
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Party
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Party
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Add attendee
     *
     * @param  \Party\Bundle\PrivateBundle\Entity\Attendee $attendee
     * @return Banner
     */
    public function addAttendee(\Party\Bundle\PrivateBundle\Entity\Attendee $attendee)
    {
        $this->attendees[] = $attendee;

        return $this;
    }

    /**
     * Remove attendee
     *
     * @param \Party\Bundle\PrivateBundle\Entity\Attendee $attendee
     */
    public function removeAttendee(\Party\Bundle\PrivateBundle\Entity\Attendee $attendee)
    {
        $this->attendees->removeElement($attendee);
    }

    /**
     * Get attendees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

}
