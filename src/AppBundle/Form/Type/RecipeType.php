<?php


namespace AppBundle\Form\Type;


use AppBundle\Entity\Fruit;
use AppBundle\Entity\Recipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function __construct()
    {
    }

    public function configureOptions(OptionsResolver $resolver)
   {
       return $resolver->setDefaults([
           'data_class' => Recipe::class,
       ]);
   }

   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
           ->add('name', TextType::class, [
               'label' => 'Naam',
               'required' => true
           ])
           ->add('priceLiter', TextType::class, [
               'label' => 'Prijs',
               'required' => true
           ])
           ->add('preperation', TextareaType::class, [
               'label' => 'Bereiding',
               'required' => true
           ])
           ->add('fruit', EntityType::class, [
               'class' => Fruit::class,
               'label' => 'Bereiding',
               'required' => true
           ])
           ->add('save', SubmitType::class, [
               'label' => 'Opslaan'
           ])
       ;
   }
}