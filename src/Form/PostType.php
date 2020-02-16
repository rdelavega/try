<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('attr'=>array(
              'class'=>"validate",
              'type'=>'text',
              'id'=>"icon_prefix"
             )))
            ->add('save', SubmitType::class, array('attr'=>array(
              'class'=>"waves-effect waves-light btn indigo center x-large",
              'id' =>'send'
            )))
            ->add('attachment', FileType::class, [
              'mapped' => false
            ])
            ->add('category', EntityType::class, [
              'class' => Category::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
