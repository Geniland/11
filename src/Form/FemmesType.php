<?php

namespace App\Form;

use App\Entity\Femmes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FemmesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FemmeImage')
            ->add('FemmeNom')
            ->add('FemmePrix')
            ->add('FemmeEtat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Femmes::class,
        ]);
    }
}
