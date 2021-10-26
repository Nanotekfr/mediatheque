<?php

namespace App\Controller;

use App\Service\DateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FooterInfosController extends AbstractController
{
    public function getInfos(Request $request, DateService $date): Response
    {
        $infos = [];
        $favLanguages = $request->getLanguages();
        $browser = $request->headers->get('User-Agent');

        $infos['ipVisitor'] = $request->getClientIp();
        $infos['favLang'] = $favLanguages[0];
        $infos['browser'] = $browser;

        $currentDate = $date->getCurrentDay();
        $daySinceNewYearsDay = $date->daySinceNewYearDay();

        return $this->render('public/commun/footer-infos.html.twig', [
          'infos' => $infos,
          'current_date' => $currentDate,
          'day_since_new_years_day' => $daySinceNewYearsDay,
        ]);
    }
}
