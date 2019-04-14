<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Fruit;
use AppBundle\Entity\Recipe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GuestController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('guest/index.html.twig', [

        ]);
    }

    /**
     * @Route("/recipes", name="recipeList")
     */
    public function recipesAction(Request $request)
    {
        return $this->render('guest/recipeList.html.twig', [
            'recipes' => $this->em->getRepository(Recipe::class)->findAll(),
        ]);
    }

    /**
     * @Route("/fruits", name="fruitList")
     */
    public function fruitsAction(Request $request)
    {
        return $this->render('guest/fruitList.html.twig', [
            'fruits' => $this->em->getRepository(Fruit::class)->findAll(),
        ]);
    }
}
