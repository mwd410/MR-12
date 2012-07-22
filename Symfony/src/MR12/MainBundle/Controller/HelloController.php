<?php

namespace MR12\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MR12\MainBundle\Entity\Product;

class HelloController extends Controller {

    public function indexAction($name, $price) {
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription("hello fucker.");
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();
        
        return $this->render('MR12MainBundle:Hello:index.html.twig', array('name' => $name, 'price' => $price));
    }
}