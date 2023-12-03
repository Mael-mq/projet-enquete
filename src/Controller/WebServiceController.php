<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebServiceController extends AbstractController
{
    #[Route('/api', name: 'app_web_service')]
    public function index(): Response
    {
        return $this->render('webService/index.html.twig');
    }
}