<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'])]
    // private ?Article $article = null;

    // #[Vich\UploadableField(mapping: 'articles', fileNameProperty: 'imageName', size: 'imageSize')]
    // private ?File $imageFile = null;

    // #[ORM\Column(nullable: true)]
    // private ?string $imageName = null;

    // #[ORM\Column(nullable: true)]
    // private ?int $imageSize = null;

    // #[ORM\Column(nullable: true)]
    // private ?\DateTimeImmutable $updatedAt = null;

    
    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    // public function setImageFile(?File $imageFile = null): void
    // {
    //     $this->imageFile = $imageFile;

    //     if (null !== $imageFile) {
    //         // It is required that at least one field changes if you are using doctrine
    //         // otherwise the event listeners won't be called and the file is lost
    //         $this->updatedAt = new \DateTimeImmutable();
    //     }
    // }

    // public function getImageFile(): ?File
    // {
    //     return $this->imageFile;
    // }

    // public function setImageName(?string $imageName): void
    // {
    //     $this->imageName = $imageName;
    // }

    // public function getImageName(): ?string
    // {
    //     return $this->imageName;
    // }

    // public function setImageSize(?int $imageSize): void
    // {
    //     $this->imageSize = $imageSize;
    // }

    // public function getImageSize(): ?int
    // {
    //     return $this->imageSize;
    // }

    // public function getArticle(): ?Article
    // {
    //     return $this->article;
    // }

    // public function setArticle(?Article $article): self
    // {
    //     $this->article = $article;

    //     return $this;
    // }

    
}