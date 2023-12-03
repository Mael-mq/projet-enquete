<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ReponsesUtilisateurs;
use App\Entity\Questions;
use App\Entity\Reponses;
use App\Repository\QuestionsRepository;
use App\Repository\ReponsesRepository;

class EnqueteController extends AbstractController
{
    #[Route('/enquete', name: 'app_enquete')]
    public function recuperation(
        QuestionsRepository $qr,
        ReponsesRepository $rr,
        Request $request,
        EntityManagerInterface $em
        )
    {
        $questions = $qr->findAll();
        $reponses = $rr->findAll();

        if($request->isMethod('POST')){
            $data = $request->request->get('reponseUtilisateur');
            $data = json_decode($data);
            Vardumper::dump($data);
        
            foreach($data as $value){
                $repU = new ReponsesUtilisateurs();
                $quest = $qr->find($value->question);
                $rep = $rr->find($value->reponse);

                $repU->setQuestion($quest);
                $repU->setReponse($rep);

                $em->persist($repU);
                $em->flush();
            }
        }

        $reponses = json_encode($reponses);
        $questions = json_encode($questions);

        return $this->render('enquete/index.html.twig', [
            'questions' => $questions,
            'reponses' => $reponses,
        ]);
    }
}