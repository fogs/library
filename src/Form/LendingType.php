<?php

namespace App\Form;

use App\Entity\Lending;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LendingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('collectedAt', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('returnedAt', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('member')
            ->add('book');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lending::class,
        ]);
    }
}
