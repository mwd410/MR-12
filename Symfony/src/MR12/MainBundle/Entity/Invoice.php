<?php
namespace MR12\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoices")
 */
class Invoice{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="invoices")
     * @ORM\JoinTable(name="invoice_product")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add products
     *
     * @param MR12\MainBundle\Entity\Product $products
     * @return Invoice
     */
    public function addProduct(\MR12\MainBundle\Entity\Product $products)
    {
        $this->products[] = $products;
        return $this;
    }

    /**
     * Remove products
     *
     * @param <variableType$products
     */
    public function removeProduct(\MR12\MainBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Invoice
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}