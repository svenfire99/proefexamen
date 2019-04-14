<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Fruit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FruitType extends AbstractType
{
    public function __construct()
    {
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        return $resolver->setDefaults([
            'data_class' => Fruit::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Naam',
                'required' => true
            ])
            ->add('season', TextType::class, [
                'label' => 'Seizoen',
                'required' => true
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Opslaan'
            ])
        ;
    }
}