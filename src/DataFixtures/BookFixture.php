<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Book;

class BookFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $entity = (new Book())
        ->setTitle('Lorem ipsum')
        ->setIsbn('978-3-7657-3278-2')
        ->setNumber('B-100')
        ->addAuthor($this->getReference(AuthorFixture::caesar));
        $manager->persist($entity);
        
        $entity = (new Book())
        ->setTitle('Ratatouille')
        ->setIsbn('978-3-7657-8365-9')
        ->setNumber('B-101')
        ->addAuthor($this->getReference(AuthorFixture::caesar));
        $manager->persist($entity);
        
        $entity = (new Book())
        ->setTitle('Cooking with fun')
        ->setIsbn('978-3-0275-2642-1')
        ->setNumber('B-102')
        ->addAuthor($this->getReference(AuthorFixture::caesar));
        $manager->persist($entity);
        
        $manager->flush();
    }

    function getDependencies()
    {
        return array(
            AuthorFixture::class,
        );
    }
}
