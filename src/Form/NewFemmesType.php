<?php

namespace App\Form;

use App\Entity\NewFemmes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class NewFemmesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichFileType::class, [
                'label' => 'Image de produit', // Le libellé du champ de fichier.
                'required' => false,])
                
            ->add('FemmeImage')
            ->add('FemmeNom')
            ->add('FemmePrix')
            ->add('FemmeEtat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewFemmes::class,
        ]);
    }
}
