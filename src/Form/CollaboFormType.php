<?php

namespace App\Form;

use App\Entity\Collaborateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollaboFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('ROLE_USER')
            ->add('password')
            ->add('Nom')
            ->add('Prenom')
            ->add('Telephone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Collaborateur::class,
        ]);
    }
}
