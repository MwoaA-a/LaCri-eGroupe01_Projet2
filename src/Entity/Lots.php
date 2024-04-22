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

    #[ORM\Column(length: 50)]
    private ?String $codeEtat = null;

    #[ORM\Column]
    private ?int $espece = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $idQualite = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $idPresentation = null;

    #[ORM\Column(nullable: true)]
    private ?int $idTaille = null;

    #[ORM\Column(nullable: true)]
    private ?int $idFacture = null;

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

    public function getCodeEtat(): ?String
    {
        return $this->codeEtat;
    }

    public function setCodeEtat(String $codeEtat): static
    {
        $this->codeEtat = $codeEtat;

        return $this;
    }

    public function getEspece(): ?int
    {
        return $this->espece;
    }

    public function setEspece(int $espece): static
    {
        $this->espece = $espece;

        return $this;
    }

    public function getIdQualite(): ?string
    {
        return $this->idQualite;
    }

    public function setIdQualite(?string $idQualite): static
    {
        $this->idQualite = $idQualite;

        return $this;
    }

    public function getIdPresentation(): ?string
    {
        return $this->idPresentation;
    }

    public function setIdPresentation(?string $idPresentation): static
    {
        $this->idPresentation = $idPresentation;

        return $this;
    }

    public function getIdTaille(): ?int
    {
        return $this->idTaille;
    }

    public function setIdTaille(?int $idTaille): static
    {
        $this->idTaille = $idTaille;

        return $this;
    }

    public function getIdFacture(): ?int
    {
        return $this->idFacture;
    }

    public function setIdFacture(?int $idFacture): static
    {
        $this->idFacture = $idFacture;

        return $this;
    }
}
