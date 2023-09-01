<?php

namespace App\Form;

use App\Entity\Hommes;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HommesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichFileType::class, [
                'label' => 'photo du produit', 
                'required' => false,])
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
