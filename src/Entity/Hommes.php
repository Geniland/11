<?php

namespace App\Entity;

use App\Repository\HommesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HommesRepository::class)]
class Hommes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BLOB)]
    private $HommeImages = null;

    #[ORM\Column(length: 255)]
    private ?string $HommeNom = null;

    #[ORM\Column]
    private ?int $HommePrix = null;

    #[ORM\Column]
    private ?int $HommeEtat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHommeImages()
    {
        return $this->HommeImages;
    }

    public function setHommeImages($HommeImages): self
    {
        $this->HommeImages = $HommeImages;

        return $this;
    }

    public function getHommeNom(): ?string
    {
        return $this->HommeNom;
    }

    public function setHommeNom(string $HommeNom): self
    {
        $this->HommeNom = $HommeNom;

        return $this;
    }

    public function getHommePrix(): ?int
    {
        return $this->HommePrix;
    }

    public function setHommePrix(int $HommePrix): self
    {
        $this->HommePrix = $HommePrix;

        return $this;
    }

    public function getHommeEtat(): ?int
    {
        return $this->HommeEtat;
    }

    public function setHommeEtat(int $HommeEtat): self
    {
        $this->HommeEtat = $HommeEtat;

        return $this;
    }
}
