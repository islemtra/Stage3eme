<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Enter product name'],
                'label' => 'Product Name',
                'required' => true,
            ])
            ->add('prix', NumberType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter price',
                    'min' => 0,  // Optional: Ensure no negative prices
                    'step' => '0.01',  // Optional: Allow decimals for precise pricing
                ],
                'label' => 'Price',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
