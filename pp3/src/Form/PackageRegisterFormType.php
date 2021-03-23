<?php

namespace App\Form;

use App\Entity\Colis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PackageRegisterFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresseDepart', TextType::class, array(
                'attr' => array(
                'placeholder' => 'Rue/Lot... , Ville, Code postal', 'style' => 'width: 340px',
                ))
            )   
            ->add('adresseArrivee', TextType::class, array(
                'attr' => array(
                'placeholder' => 'Rue/Lot... , Ville, Code postal', 'style' => 'width: 340px',
                ))
            )
            ->add('taille', IntegerType::class, array(
                'attr' => array(
                'placeholder' => 'Ex: 120', 'style' => 'width: 150px',
                ))
            )
            ->add('poids', TextType::class, array(
                'attr' => array(
                'placeholder' => 'Ex: 200', 'style' => 'width: 150px; margin-left: 190px; margin-top: -78px;',
                ))
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Colis::class,
        ]);
    }
}
