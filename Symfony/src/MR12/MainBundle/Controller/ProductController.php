<?php

namespace MR12\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MR12\MainBundle\Entity\Product;
use MR12\MainBundle\Entity\Invoice;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{   
    public function indexAction()
    {
        $repository = $this->getRepository("Product");
        
        $products = $repository->findAll();
        
        $invoices = $this->getRepository("Invoice")->findAll();
        
        return $this->render('MR12MainBundle:Product:index.html.twig',
                              array('products' => $products, 'invoices' => $invoices));
    }
    
    public function deleteAction($id) {
        $repository = $this->getRepository("Product");
        
        $em = $this->getDoctrine()->getEntitymanager();
        $product = $repository->find($id);
        
        $message = $product->getName()." was removed.";
        
        $em->remove($product);
        $em->flush();
        
        
        
        return $this->redirect('MR12MainBundle:Product:index');
    }
    
    private function getRepository($ent) {
      return $this->getDoctrine()->getRepository("MR12MainBundle:$ent");
    }
}