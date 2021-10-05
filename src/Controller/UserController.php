<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController {

  #[Route('/', name: 'home')]
  public function index(): Response
  {
      return $this->render('user/index.html.twig', [
          'controller_name' => 'UserController',
      ]);
  }
  #[Route('/presentation', name: 'presentation')]
  public function presentation(): Response
  {
      return $this->render('user/presentation.html.twig', [
          'controller_name' => 'UserController',
      ]);
  }
}