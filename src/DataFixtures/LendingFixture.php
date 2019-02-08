<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Lending;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LendingFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $entity = (new Lending())
        ->setCollectedAt(new \DateTime())
        ->setMember($this->getReference(MemberFixture::angelica));
        $manager->persist($entity);
        
        $manager->flush();
    }

    function getDependencies()
    {
        return array(
            MemberFixture::class,
        );
    }
}
