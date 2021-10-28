<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/* #[IsGranted('ROLE_ADMIN')] */

#[Route('/admin', name: 'admin-')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('back-office/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
