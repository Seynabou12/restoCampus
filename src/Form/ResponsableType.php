<?php

namespace App\Form;

use App\Entity\Responsable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => "form-control" , 
                    'placeholder' => "saisir votre nom"]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "saisir votre prenom"]
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => "form-control" ,
                    'placeholder' => "votre adresse"]
            ])
            ->add('telephone', TextType::class, [
                'attr' => [
                    'class' => "form-control",
                    'placeholder' => "votre numéro téléphone"]
            ])
            ->add('created_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}
