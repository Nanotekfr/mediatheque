<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Author;
use App\Entity\Category;
use App\Entity\Book;
use App\Entity\Cd;
use App\Entity\Document;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    $faker = Factory::create('fr_FR');

    $author = new Author();

    $author->setLastName($faker->firstName());
    $author->setFirstName($faker->lastName());

    $manager->persist($author);

    $categoryArray = ['novel', 'bd', 'fantasy', 'medieval', 'suspens', 'true story', 'jazz', 'classic'];
    $objectCategoryArray = [];
    foreach ($categoryArray as $categoryName) {
        $category = new Category();
        $category->setName($categoryName);
        $manager->persist($category);
        $objectCategoryArray[] = $category;
    }

    for ($i=0; $i < 10; $i++) {
      $book = new Book();
      $book->setNbPage($faker->randomNumber(3, false));
      $book->setTitle($faker->title());
      $book->setCode($faker->bothify('?????-#####'));
      $manager->persist($book);
    }


    for ($i=0; $i < 10; $i++) {
      $cd = new Cd();
      $cd->setDuration($faker->numberBetween(180, 4200));
      $cd->setTitle($faker->sentence(3));
      $cd->setCode($faker->bothify('?????-#####'));
      $manager->persist($cd);
    }

    $manager->flush();

    $DocumentRepository = $manager->getRepository(Document::class);
    $allDocuments = $DocumentRepository->findAll();

    foreach ($allDocuments as $document) {
        $randomCategory = array_rand($objectCategoryArray, 1);
        $document->addCategory($objectCategoryArray[$randomCategory]);
    }

    $manager->flush();

  }
}