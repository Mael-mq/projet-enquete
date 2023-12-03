<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultatsController extends AbstractController
{
    #[Route('/resultats', name: 'app_resultats')]
    public function index(): Response
    {
        return $this->render('resultats/index.html.twig', [
            'controller_name' => 'ResultatsController',
        ]);
    }
}