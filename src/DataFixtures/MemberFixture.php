<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Member;

class MemberFixture extends Fixture
{
    const dave = 'member/dave';
    const angelica = 'member/angelica';
    const mosegi = 'member/mosegi';
    
    public function load(ObjectManager $manager)
    {
        $entity = (new Member())
        ->setUsername('dave')
        ->setLastLogin(new \DateTime('-14 days'))
        ->setEmailAddress('dave@example.com');
        $this->addReference(self::dave, $entity);
        $manager->persist($entity);
        
        $entity = (new Member())
        ->setUsername('angelica')
        ->setEmailAddress('angelica@example.com');
        $this->addReference(self::angelica, $entity);
        $manager->persist($entity);
        
        $entity = (new Member())
        ->setUsername('mosegi')
        ->setEmailAddress('mosegi@example.com');
        $this->addReference(self::mosegi, $entity);
        $manager->persist($entity);
        
        $manager->flush();
    }
}
