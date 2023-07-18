<?php

namespace App\Entity;

use App\Repository\FemmesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FemmesRepository::class)]
class Femmes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BLOB)]
    private $FemmeImage = null;

    #[ORM\Column(length: 255)]
    private ?string $FemmeNom = null;

    #[ORM\Column]
    private ?int $FemmePrix = null;

    #[ORM\Column]
    private ?int $FemmeEtat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFemmeImage()
    {
        return $this->FemmeImage;
    }

    public function setFemmeImage($FemmeImage): self
    {
        $this->FemmeImage = $FemmeImage;

        return $this;
    }

    public function getFemmeNom(): ?string
    {
        return $this->FemmeNom;
    }

    public function setFemmeNom(string $FemmeNom): self
    {
        $this->FemmeNom = $FemmeNom;

        return $this;
    }

    public function getFemmePrix(): ?int
    {
        return $this->FemmePrix;
    }

    public function setFemmePrix(int $FemmePrix): self
    {
        $this->FemmePrix = $FemmePrix;

        return $this;
    }

    public function getFemmeEtat(): ?int
    {
        return $this->FemmeEtat;
    }

    public function setFemmeEtat(int $FemmeEtat): self
    {
        $this->FemmeEtat = $FemmeEtat;

        return $this;
    }
}
