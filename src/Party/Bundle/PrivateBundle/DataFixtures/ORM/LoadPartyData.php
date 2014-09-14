<?php

namespace ERunner\Bundle\FinBackEndBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Party\Bundle\PrivateBundle\Entity\Party;

/**
 * LoadPartyData.
 *
 * @author Alejandro Bustamante <alejandro.bustamante.serrano@gmail.com>
 */
class LoadPartyData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $party = new Party();
        $party->setName('Fun Party A');
        $party->setLocation('The beach');
        $party->setDate(new \DateTime(sprintf('NOW + %s DAYS', 3)));

        $manager->persist($party);
        $this->setReference('PartyA', $party);


        $party = new Party();
        $party->setName('Party B');
        $party->setLocation('The bar');
        $party->setDate(new \DateTime(sprintf('NOW + %s DAYS', 2)));

        $manager->persist($party);
        $this->setReference('PartyB', $party);


        $party = new Party();
        $party->setName('VIP party C');
        $party->setLocation('The club');
        $party->setDate(new \DateTime(sprintf('NOW + %s DAYS', 5)));

        $manager->persist($party);
        $this->setReference('PartyC', $party);

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}
