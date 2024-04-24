<?php

namespace App\Entity;

use App\Repository\AcheteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcheteurRepository::class)]
class Acheteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomAcheteur = null;

    #[ORM\Column(length: 50)]
    private ?string $prenomAcheteur = null;

    #[ORM\Column(length: 50)]
    private ?string $codePostale = null;

    #[ORM\Column(length: 75)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sexe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAcheteur(): ?string
    {
        return $this->nomAcheteur;
    }

    public function setNomAcheteur(string $nomAcheteur): static
    {
        $this->nomAcheteur = $nomAcheteur;

        return $this;
    }

    public function getPrenomAcheteur(): ?string
    {
        return $this->prenomAcheteur;
    }

    public function setPrenomAcheteur(string $prenomAcheteur): static
    {
        $this->prenomAcheteur = $prenomAcheteur;

        return $this;
    }

    public function getCodePostale(): ?string
    {
        return $this->codePostale;
    }

    public function setCodePostale(string $codePostale): static
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }
}
