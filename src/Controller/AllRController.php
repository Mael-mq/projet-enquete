<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllRController extends AbstractController
{
    #[Route('/all/r', name: 'app_all_r')]
    public function index(): Response
    {
        return $this->render('all_r/index.html.twig', [
            'controller_name' => 'AllRController',
        ]);
    }
}
