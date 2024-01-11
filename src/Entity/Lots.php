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

    #[ORM\Column(nullable: true)]
    private ?int $equa = null;

    #[ORM\Column]
    private ?int $espece = null;

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

    public function getEqua(): ?int
    {
        return $this->equa;
    }

    public function setEqua(?int $equa): static
    {
        $this->equa = $equa;

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
}
