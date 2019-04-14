<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Fruit;
use AppBundle\Entity\Order;
use AppBundle\Entity\OrderRow;
use AppBundle\Entity\Recipe;
use AppBundle\Form\Type\FruitType;
use AppBundle\Form\Type\OrderRowType;
use AppBundle\Form\Type\OrderType;
use AppBundle\Form\Type\RecipeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/login", name="login")
     */
    public function adminLoginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'admin/login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,
            )
        );
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/admin", name="adminDashboard")
     */
    public function dashboardAction(Request $request)
    {
        return $this->render('guest/index.html.twig', [

        ]);
    }

    /**
     * @Route("/admin/recipes", name="recipesAdmin")
     */
    public function recipeAction(Request $request)
    {
        return $this->render('admin/recipeList.html.twig', [
            'recipes' => $this->em->getRepository(Recipe::class)->findAll(),
        ]);
    }

    /**
     * @Route("/admin/recipe/create", name="recipeCreate")
     */
    public function recipeCreateAction(Request $request)
    {
        $form = $this->createForm(RecipeType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($form->getData());
            $this->em->flush();

            return $this->redirectToRoute('recipesAdmin');
        }

        return $this->render('admin/recipeCRUD.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/recipe/{id}/edit", name="recipeEdit")
     */
    public function recipeEditAction(Request $request, $id)
    {
        $recipe = $this->em->getRepository(Recipe::class)->find($id);

        $form = $this->createForm(RecipeType::class, $recipe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($form->getData());
            $this->em->flush();

            return $this->redirectToRoute('recipesAdmin');
        }

        return $this->render('admin/recipeCRUD.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/fruits", name="fruitsAdmin")
     */
    public function fruitAction(Request $request)
    {
        return $this->render('admin/fruitList.html.twig', [
            'fruits' => $this->em->getRepository(Fruit::class)->findAll(),
        ]);
    }

    /**
     * @Route("/admin/fruit/create", name="fruitCreate")
     */
    public function fruitCreateAction(Request $request)
    {
        $form = $this->createForm(FruitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($form->getData());
            $this->em->flush();

            return $this->redirectToRoute('fruitsAdmin');
        }

        return $this->render('admin/fruitCRUD.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/fruit/{id}/edit", name="fruitEdit")
     */
    public function fruitEditAction(Request $request, $id)
    {
        $recipe = $this->em->getRepository(Fruit::class)->find($id);

        $form = $this->createForm(FruitType::class, $recipe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($form->getData());
            $this->em->flush();

            return $this->redirectToRoute('fruitsAdmin');
        }

        return $this->render('admin/fruitCRUD.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/orders", name="orderAdmin")
     */
    public function orderAction(Request $request)
    {
        return $this->render('admin/orderList.html.twig', [
            'orderRows' => $this->em->getRepository(OrderRow::class)->findAll(),
        ]);
    }

    /**
     * @Route("/admin/order/create", name="orderCreate")
     */
    public function orderCreateAction(Request $request)
    {
        $form = $this->createForm(OrderType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $order = new Order();
            $order->setDeliveryDate($data['deliveryDate']);
            $order->setCustomer($data['customer']);
            $order->setPhone($data['phone']);
            $this->em->persist($order);

            $orderRow = $data['row'];
            $orderRow->setOrder($order);
            $this->em->persist($orderRow);

            $this->em->flush();

            return $this->redirectToRoute('orderAdmin');
        }

        return $this->render('admin/orderCRUD.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/order/{id}/edit", name="orderEdit")
     */
    public function orderEditAction(Request $request, $id)
    {
        $form = $this->createForm(OrderType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $order = $this->em->getRepository(Order::class)->find($id);
            $order->setDeliveryDate($data['deliveryDate']);
            $order->setCustomer($data['customer']);
            $order->setPhone($data['phone']);
            $this->em->persist($order);

            $orderRow = $data['row'];
            $orderRow->setOrder($order);
            $this->em->persist($orderRow);

            $this->em->flush();

            return $this->redirectToRoute('orderAdmin');
        }

        return $this->render('admin/orderCRUD.html.twig', [
            'form' => $form->createView()
        ]);
    }


}