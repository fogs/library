<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Author;

class AuthorFixture extends Fixture
{
    const caesar = 'caesar';
    const disney = 'disney';
    const ramsey = 'ramsey';
    
    public function load(ObjectManager $manager)
    {
        $entity = (new Author())
        ->setName('Julius Caesar');
        $manager->persist($entity);
        $this->addReference(self::caesar, $entity);
        
        $entity = (new Author())
        ->setName('Walt Disney');
        $manager->persist($entity);
        $this->addReference(self::disney, $entity);
        
        $entity = (new Author())
        ->setName('Gordon Ramsey');
        $manager->persist($entity);
        $this->addReference(self::ramsey, $entity);
        
        $manager->flush();
    }
}
