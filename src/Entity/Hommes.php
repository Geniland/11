<?php

namespace App\Entity;

use App\Repository\HommesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: HommesRepository::class)]
#[Vich\Uploadable]

class Hommes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(type: Types::BLOB , nullable: true)]
    private $HommeImages = null;

    #[Vich\UploadableField(mapping: 'articles', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

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
    
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
}
