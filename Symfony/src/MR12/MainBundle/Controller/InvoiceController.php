<?php

namespace MR12\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MR12\MainBundle\Entity\Product;
use MR12\MainBundle\Entity\Invoice;
use Symfony\Component\HttpFoundation\Request;

class InvoiceController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getRepository('Invoice');
        
        $invoices = $repository->findAll();
        
        return $this->render('MR12MainBundle:Invoice:index.html.twig', array('invoices' => $invoices));
    }
    
    public function addAction(Request $request, $product_id) {
        $invoice_id = $this->get('request')->request->get('invoice_id');
        $em = $this->getEM();
        
        $product_r = $this->getRepository('Product');
        $product = $product_r->find($product_id);
        
        $invoice_r = $this->getRepository('Invoice');
        $invoice = $invoice_r->find($invoice_id);
        
        $invoice->getProducts()->add($product);
        
        $em->persist($invoice);
        $em->flush();
        
        return $this->forward('MR12MainBundle:Invoice:index');
    }
    
    private function getEM() {
        return $this->getDoctrine()->getEntityManager();
    }
    
    private function getRepository($entity) {
      return $this->getDoctrine()->getRepository('MR12MainBundle:'.$entity);
    }
}