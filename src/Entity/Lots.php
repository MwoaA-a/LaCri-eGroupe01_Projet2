<?php

namespace App\Entity;

use App\Repository\LotsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LotsRepository::class)]
class Lots
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numBateau = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePeche = null;

    #[ORM\Column(nullable: true)]
    private ?int $poidsBrutLot = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixPlancher = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixDepart = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixEncheresMax = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEnchere = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heureDebutEnchere = null;

    #[ORM\Column(nullable: true)]
    private ?int $codeEtat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumBateau(): ?int
    {
        return $this->numBateau;
    }

    public function setNumBateau(int $numBateau): static
    {
        $this->numBateau = $numBateau;

        return $this;
    }

    public function getDatePeche(): ?\DateTimeInterface
    {
        return $this->datePeche;
    }

    public function setDatePeche(\DateTimeInterface $datePeche): static
    {
        $this->datePeche = $datePeche;

        return $this;
    }

    public function getPoidsBrutLot(): ?int
    {
        return $this->poidsBrutLot;
    }

    public function setPoidsBrutLot(?int $poidsBrutLot): static
    {
        $this->poidsBrutLot = $poidsBrutLot;

        return $this;
    }

    public function getPrixPlancher(): ?int
    {
        return $this->prixPlancher;
    }

    public function setPrixPlancher(?int $prixPlancher): static
    {
        $this->prixPlancher = $prixPlancher;

        return $this;
    }

    public function getPrixDepart(): ?int
    {
        return $this->prixDepart;
    }

    public function setPrixDepart(?int $prixDepart): static
    {
        $this->prixDepart = $prixDepart;

        return $this;
    }

    public function getPrixEncheresMax(): ?int
    {
        return $this->prixEncheresMax;
    }

    public function setPrixEncheresMax(?int $prixEncheresMax): static
    {
        $this->prixEncheresMax = $prixEncheresMax;

        return $this;
    }

    public function getDateEnchere(): ?\DateTimeInterface
    {
        return $this->dateEnchere;
    }

    public function setDateEnchere(?\DateTimeInterface $dateEnchere): static
    {
        $this->dateEnchere = $dateEnchere;

        return $this;
    }

    public function getHeureDebutEnchere(): ?\DateTimeInterface
    {
        return $this->heureDebutEnchere;
    }

    public function setHeureDebutEnchere(?\DateTimeInterface $heureDebutEnchere): static
    {
        $this->heureDebutEnchere = $heureDebutEnchere;

        return $this;
    }

    public function getCodeEtat(): ?int
    {
        return $this->codeEtat;
    }

    public function setCodeEtat(?int $codeEtat): static
    {
        $this->codeEtat = $codeEtat;

        return $this;
    }
}
