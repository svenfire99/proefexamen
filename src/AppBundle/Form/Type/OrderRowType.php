<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\OrderRow;
use AppBundle\Entity\Recipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderRowType extends AbstractType
{
    public function __construct()
    {
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        return $resolver->setDefaults([
            'data_class' => OrderRow::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipe', EntityType::class, [
                'class' => Recipe::class,
                'label' => 'Recept'
            ])
            ->add('amount', NumberType::class, [
                'label' => 'Aantal'
            ])
        ;
    }
}