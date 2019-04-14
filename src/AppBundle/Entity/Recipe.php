<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $priceLiter;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $preperation;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Fruit")
     * @ORM\JoinColumn(name="fruit_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $fruit;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderRow", mappedBy="recipe")
     */
    private $orderRow;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPriceLiter()
    {
        return $this->priceLiter;
    }

    /**
     * @param mixed $priceLiter
     */
    public function setPriceLiter($priceLiter)
    {
        $this->priceLiter = $priceLiter;
    }

    /**
     * @return mixed
     */
    public function getPreperation()
    {
        return $this->preperation;
    }

    /**
     * @param mixed $preperation
     */
    public function setPreperation($preperation)
    {
        $this->preperation = $preperation;
    }

    /**
     * @return mixed
     */
    public function getFruit()
    {
        return $this->fruit;
    }

    /**
     * @param mixed $fruit
     */
    public function setFruit($fruit)
    {
        $this->fruit = $fruit;
    }

    /**
     * @return mixed
     */
    public function getOrderRow()
    {
        return $this->orderRow;
    }

    /**
     * @param mixed $orderRow
     */
    public function setOrderRow($orderRow)
    {
        $this->orderRow = $orderRow;
    }

    public function __toString()
    {
        return $this->name;
    }
}