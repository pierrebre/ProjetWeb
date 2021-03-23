<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Nom', 'style' => 'width: 150px',
                ))
            )
            ->add('prenom', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Prénom', 'style' => 'width: 150px; margin-left: 190px; margin-top: -78px',
                ))
            )
            ->add('email', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Saisissez votre Email', 'style' => 'width: 340px',
                ))
            )
            // ->add('plainPassword', PasswordType::class, [
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type' => PasswordType::class,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit être d\'au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'invalid_message' => 'Les deux mots de passe saisis ne sont pas identiques',
                'first_options'  => array('label' => 'Mot De Passe :', 'attr' => array('placeholder' => 'Saisissez votre mot de passe', 'style' => 'width: 340px')),
                'second_options' => array('label' => ' ', 'attr' => array('placeholder' => 'Confirmez votre mot de passe', 'style' => 'width: 340px; margin-top:-20px;')),
                
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
