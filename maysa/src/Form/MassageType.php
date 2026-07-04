<?php

namespace App\Form;

use App\Entity\Massage;
use App\Entity\MassageCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MassageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('subtitle')
            ->add('description')
            ->add('image')
            ->add('active')
            ->add('position')
            ->add('collection', EntityType::class, [
                'class' => MassageCollection::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Massage::class,
        ]);
    }
}
