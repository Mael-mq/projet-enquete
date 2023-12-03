<?php

namespace App\Controller;

use App\Repository\ReponsesUtilisateursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AllQController extends AbstractController
{
    #[Route('/api/allQ', name: 'api_all', methods: 'GET')]
    public function index(EntityManagerInterface $em)
    {
        $query = $em->createQuery('SELECT q.id as id_question, q.texte_question, r.texte_reponse, COUNT(ru.reponse) as nombre_reponses
            FROM App\Entity\Questions as q, App\Entity\Reponses as r, App\Entity\ReponsesUtilisateurs as ru
            WHERE ru.question = q.id
            AND ru.reponse = r.id
            GROUP BY r.id
            ORDER BY q.id
        ');

        $reps = $query->getResult();
        
        return $this->json($reps, 200, []);
    }
}
