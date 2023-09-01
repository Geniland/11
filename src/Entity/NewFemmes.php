<?php

namespace App\Entity;

use App\Repository\NewFemmesRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


#[ORM\Entity(repositoryClass: NewFemmesRepository::class)]
#[Vich\Uploadable]
class NewFemmes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $FemmeImage = null;

    #[ORM\Column(length: 255)]
    private ?string $FemmeNom = null;

    #[ORM\Column]
    private ?int $FemmePrix = null;

    #[ORM\Column]
    private ?int $FemmeEtat = null;

    #[Vich\UploadableField(mapping: 'articles', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

  


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFemmeImage()
    {
        return $this->FemmeImage;
    }

    public function setFemmeImage( $FemmeImage): self
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
