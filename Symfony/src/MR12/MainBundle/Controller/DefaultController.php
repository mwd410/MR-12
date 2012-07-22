<?php

namespace MR12\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MR12MainBundle:Default:index.html.twig', array('name' => $name));
    }
}
