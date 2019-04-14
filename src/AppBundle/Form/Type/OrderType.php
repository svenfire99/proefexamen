<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function __construct()
    {
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        return $resolver->setDefaults([
//            'data_class' => Order::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deliveryDate', DateType::class, [
                'label' => 'afhaaldatum'
            ])
            ->add('customer', TextType::class, [
                'label' => 'Klant',
                'required' => true
            ])
            ->add('phone', TextType::class, [
                'label' => 'Telefoon'
            ])
            ->add('row', OrderRowType::class, [
                'label' => null
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Opslaan'
            ])
        ;
    }
}