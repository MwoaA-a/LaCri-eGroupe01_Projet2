<?php

namespace App\Entity;

use App\Repository\DetailFacRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailFacRepository::class)]
class DetailFac
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idLot = null;

    #[ORM\Column]
    private ?int $idFac = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLot(): ?int
    {
        return $this->idLot;
    }

    public function setIdLot(int $idLot): static
    {
        $this->idLot = $idLot;

        return $this;
    }

    public function getIdFac(): ?int
    {
        return $this->idFac;
    }

    public function setIdFac(int $idFac): static
    {
        $this->idFac = $idFac;

        return $this;
    }
}
