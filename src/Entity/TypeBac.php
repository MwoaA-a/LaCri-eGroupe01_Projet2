<?php

namespace App\Entity;

use App\Repository\TypeBacRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeBacRepository::class)]
class TypeBac
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $tare = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTare(): ?float
    {
        return $this->tare;
    }

    public function setTare(float $tare): static
    {
        $this->tare = $tare;

        return $this;
    }
}
