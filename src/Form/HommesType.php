<?php

namespace App\Form;

use App\Entity\Hommes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HommesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('HommeImages')
            ->add('HommeNom')
            ->add('HommePrix')
            ->add('HommeEtat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hommes::class,
        ]);
    }
}
