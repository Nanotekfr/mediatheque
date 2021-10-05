<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'home')]

    public function index(): Response
    {
      $finder = new Finder();

      $books = $finder->files()->in(__DIR__ . "/../../public/json/books.json");

      if ($books->hasResults()) {
        $allBooks = $books->hasResults();
      }

      return $this->render('user/book.html.twig', [
        'controller_name' => 'UserController',
        'allBooks' => $allBooks

      ]);
    }
}
