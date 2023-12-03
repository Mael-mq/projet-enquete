<?php

namespace App\Controller;

use App\Repository\ReponsesUtilisateursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class QuestionController extends AbstractController
{
    #[Route('/api/question', name: 'api_question', methods: 'GET')]
    public function index(EntityManagerInterface $em)
    {
        $query = $em->createQuery('SELECT q.id as id_question, q.texte_question, r.texte_reponse, COUNT(ru.reponse) as nombre_reponses
            FROM App\Entity\Questions as q, App\Entity\Reponses as r, App\Entity\ReponsesUtilisateurs as ru
            WHERE ru.question = q.id
            AND ru.reponse = r.id
            AND q.id = :id
            GROUP BY r.id
        ');

        

        if(isset($_GET['q']) && !empty($_GET['q']) && intval($_GET['q']) !== 0){
            $query->setParameter('id',$_GET['q']);
            $reps = $query->getResult();
            if(empty($reps)){
                $reps = [
                    "erreur" => "le numéro de question que vous cherchez n'existe pas, essayez api/all"
                ];
            }
        }else{
            $reps = [
                "erreur" => "paramètre 'q' invalide ou manquant"
            ];
        }

       
        
        return $this->json($reps, 200, []);
    }
}
