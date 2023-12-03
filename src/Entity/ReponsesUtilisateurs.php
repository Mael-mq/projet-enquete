<?php

namespace App\Entity;

use App\Repository\ReponsesUtilisateursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponsesUtilisateursRepository::class)]
class ReponsesUtilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reponsesUtilisateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questions $question = null;

    #[ORM\ManyToOne(inversedBy: 'reponsesUtilisateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reponses $reponse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?Questions
    {
        return $this->question;
    }

    public function setQuestion(?Questions $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getReponse(): ?Reponses
    {
        return $this->reponse;
    }

    public function setReponse(?Reponses $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }
}
