<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $Statut = ["A faire", "En cours", "Terminé"];

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_limite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getStatut(): array
    {
        return $this->Statut;
    }

    public function setStatut(array $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->Date_limite;
    }

    public function setDateLimite(\DateTimeInterface $Date_limite): self
    {
        $this->Date_limite = $Date_limite;

        return $this;
    }
}
