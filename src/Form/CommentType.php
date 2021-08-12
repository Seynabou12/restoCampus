<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom' , TextType::class ,[
                'label' => 'votre nom',
                'attr' => [
                'class' => 'form-control'
                ]])
            ->add('prenom' , TextType::class ,[
                'label' => 'votre prenom',
                'attr' => [
                'class' => 'form-control'
                ]])
            ->add('email' , EmailType::class ,[
                'label' => 'votre email',
                'attr' => [
                'class' => 'form-control'
                ]])
            ->add('message' , TextareaType::class ,[
                'label' => 'Message',
                'attr' => [
                'class' => 'form-control'
                ]])
                ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
