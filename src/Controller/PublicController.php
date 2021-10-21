<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController 
{
  #[Route('/', name: 'home')]
  public function index(Request $request): Response
  {
    $lang = $request->server->get("LANG");
    $ip = $request->server->get("HTTP_HOST");
    $nav = $request->server->get("HTTP_SEC_CH_UA");
    $public = "Toto";
    $titre = "Mediatheque 3wa";
    return $this->render('index.html.twig', [
        'controller_name' => 'PublicController',
        'lang' => $lang,
        'ip' => $ip,
        'nav' => $nav,
        'public' => $public,
        'titre' => $titre,
    ]);
  }
  #[Route('/presentation', name: 'presentation')]
  public function presentation(): Response
  {
      return $this->render('presentation.html.twig', [
          'controller_name' => 'PublicController',
      ]);
  }
}