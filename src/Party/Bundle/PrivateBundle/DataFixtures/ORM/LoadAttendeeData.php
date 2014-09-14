<?php

namespace ERunner\Bundle\FinBackEndBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Party\Bundle\PrivateBundle\Entity\Attendee;

/**
 * LoadAttendeeData.
 *
 * @author Alejandro Bustamante <alejandro.bustamante.serrano@gmail.com>
 */
class LoadAttendeeData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $attendee = new Attendee();
        $attendee->setName('Ralph James');
        $attendee->setEmail('ralph.james@partyplanner.eu');
        $attendee->addParty($this->getReference('PartyA'));
        $attendee->addParty($this->getReference('PartyB'));
        $attendee->addParty($this->getReference('PartyC'));

        $manager->persist($attendee);

        $attendee = new Attendee();
        $attendee->setName('Harriet Jones');
        $attendee->setEmail('harriet@partyplanner.eu');
        $attendee->addParty($this->getReference('PartyA'));
        $attendee->addParty($this->getReference('PartyC'));

        $manager->persist($attendee);

        $attendee = new Attendee();
        $attendee->setName('Rebecca Taylor');
        $attendee->setEmail('rtaylor@partyplanner.eu');
        $attendee->addParty($this->getReference('PartyC'));

        $manager->persist($attendee);

        $attendee = new Attendee();
        $attendee->setName('Richard');
        $attendee->setEmail('rich@partyplanner.eu');
        $attendee->addParty($this->getReference('PartyA'));

        $manager->persist($attendee);

        $attendee = new Attendee();
        $attendee->setName('maggie');
        $attendee->setEmail('mg@partyplanner.eu');
        $attendee->addParty($this->getReference('PartyB'));
        $attendee->addParty($this->getReference('PartyC'));

        $manager->persist($attendee);

        $attendee = new Attendee();
        $attendee->setName('Peter');
        $attendee->setEmail('pete@partyplanner.eu');
        $attendee->addParty($this->getReference('PartyB'));

        $manager->persist($attendee);

        $attendee = new Attendee();
        $attendee->setName('Elizabeth');
        $attendee->setEmail('liz@partyplanner.eu');
        $attendee->addParty($this->getReference('PartyA'));
        $attendee->addParty($this->getReference('PartyC'));

        $manager->persist($attendee);

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}
