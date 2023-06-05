<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Categories;
use App\Entity\Image;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ]
            )
            ->add('contenu',TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]])
            ->add('imageFile',VichImageType::class)
            
            ->add('auteur',TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]])
            ->add('categorie', EntityType::class, [
                'class' => Categories::class, 
                'choice_label' => 'intitule'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
