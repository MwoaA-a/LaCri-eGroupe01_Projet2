<?php

namespace App\Entity;

use App\Repository\TailleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TailleRepository::class)]
class Taille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $specification = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecification(): ?string
    {
        return $this->specification;
    }

    public function setSpecification(string $specification): static
    {
        $this->specification = $specification;

        return $this;
    }
}
