<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $texte_question = null;

    #[ORM\OneToMany(mappedBy: 'id_question', targetEntity: Reponses::class)]
    private Collection $reponses;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: ReponsesUtilisateurs::class)]
    private Collection $reponsesUtilisateurs;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->reponsesUtilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteQuestion(): ?string
    {
        return $this->texte_question;
    }

    public function setTexteQuestion(string $texte_question): self
    {
        $this->texte_question = $texte_question;

        return $this;
    }

    /**
     * @return Collection<int, Reponses>
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponses $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setIdQuestion($this);
        }

        return $this;
    }

    public function removeReponse(Reponses $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getIdQuestion() === $this) {
                $reponse->setIdQuestion(null);
            }
        }

        return $this;
    }

    public function jsonSerialize(){
        $tab = [];
        foreach($this as $name => $value){
            $tab[$name] = $value;
        }
        return $tab;
    }

    /**
     * @return Collection<int, ReponsesUtilisateurs>
     */
    public function getReponsesUtilisateurs(): Collection
    {
        return $this->reponsesUtilisateurs;
    }

    public function addReponsesUtilisateur(ReponsesUtilisateurs $reponsesUtilisateur): self
    {
        if (!$this->reponsesUtilisateurs->contains($reponsesUtilisateur)) {
            $this->reponsesUtilisateurs->add($reponsesUtilisateur);
            $reponsesUtilisateur->setQuestion($this);
        }

        return $this;
    }

    public function removeReponsesUtilisateur(ReponsesUtilisateurs $reponsesUtilisateur): self
    {
        if ($this->reponsesUtilisateurs->removeElement($reponsesUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($reponsesUtilisateur->getQuestion() === $this) {
                $reponsesUtilisateur->setQuestion(null);
            }
        }

        return $this;
    }
}
