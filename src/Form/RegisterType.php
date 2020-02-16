<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class,array('attr'=>array(
              'class'=>"validate",
              'type'=>'text',
              'id'=>"icon_prefix",
              'placeholder' => 'Username'
             )))
            ->add('password', TextType::class,array('attr'=>array(
              'class'=>"validate",
              'type'=>'password',
              'id'=>"icon_prefix",
              'placeholder' => 'Password'
             )))
             ->add('save', SubmitType::class,array('attr'=>array(
               'class'=>"waves-effect waves-light btn indigo center x-large",
               'id' =>'send'
             )));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // 'data_class' => User::class,
        ]);
    }
}
