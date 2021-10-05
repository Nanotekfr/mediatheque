<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Artist;

class ArtistController extends AbstractController {
  #[Route('/artist/{id}', name: 'artist')]
  public function index(string $id, Request $request): Response
  {
    $p = $request->query->has('id') ? $request->query->get('id') : 0;
    $finder = new Finder();
    $finder->name('*.json')->in(__DIR__ . '/../../public/files');
    $content = [];
    foreach($finder as $file) {
      $content[] = $file->getContents()->json_decode();;
    }

    return $this->render('artist/index.html.twig', [
      'controller_name' => 'ArtisteController',
      'content' => $content
    ]);
  }

  #[Route('/artist/new', name: 'new_artist')]
  public function addArtist() {
    $em = $this->getDoctrine()->getManager();
    $artist = new Artist();
    $artist->setFirstName('Albert');
    $artist->setLastName('Camus');
    $artist->setBirthDate(new \DateTime());
    $artist->setDeathDate(new \DateTime());

    $em->persist($artist);

    $em->flush();
  }
}