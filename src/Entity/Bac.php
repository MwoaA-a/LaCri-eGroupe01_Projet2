<?php

namespace App\Entity;

use App\Repository\BacRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BacRepository::class)]
class Bac
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column]
    private ?int $idLot = null;

    #[ORM\Column(length: 255)]
    private ?string $idTypeBac = null;

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

    public function getIdTypeBac(): ?string
    {
        return $this->idTypeBac;
    }

    public function setIdTypeBac(string $idTypeBac): static
    {
        $this->idTypeBac = $idTypeBac;

        return $this;
    }
}
