<?php

namespace App\Form;

use App\Entity\Plats;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomPlats', TextType::class, [
                'attr' => [
                    'class' => "form-control"]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => "form-control"]
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plats::class,
        ]);
    }
}
