<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;

#[ORM\Entity(repositoryClass: ReponsesRepository::class)]
class Reponses implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reponses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?questions $id_question = null;

    #[ORM\Column(length: 255)]
    private ?string $texte_reponse = null;

    #[ORM\OneToMany(mappedBy: 'reponse', targetEntity: ReponsesUtilisateurs::class)]
    private Collection $reponsesUtilisateurs;

    public function __construct()
    {
        $this->reponsesUtilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdQuestion(): ?questions
    {
        return $this->id_question;
    }

    public function setIdQuestion(?questions $id_question): self
    {
        $this->id_question = $id_question;

        return $this;
    }

    public function getTexteReponse(): ?string
    {
        return $this->texte_reponse;
    }

    public function setTexteReponse(string $texte_reponse): self
    {
        $this->texte_reponse = $texte_reponse;

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
            $reponsesUtilisateur->setReponse($this);
        }

        return $this;
    }

    public function removeReponsesUtilisateur(ReponsesUtilisateurs $reponsesUtilisateur): self
    {
        if ($this->reponsesUtilisateurs->removeElement($reponsesUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($reponsesUtilisateur->getReponse() === $this) {
                $reponsesUtilisateur->setReponse(null);
            }
        }

        return $this;
    }
}
