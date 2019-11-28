<?php

namespace App\Form;

use App\Entity\Child;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomComplet')
            ->add('adress')
            ->add('telephone')
            ->add('photo')
            ->add('dateNais')
            ->add('education')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            'csrf_protection'=>false

        ]);
    }
}
