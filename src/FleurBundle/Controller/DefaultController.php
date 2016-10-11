<?php

namespace FleurBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     * @Template ()
     */
    public function getAccueil()
    {
        return $this->render('FleurBundle:Default:Accueil.html.twig');
    }
    
    /**
     * @Route("/Qui", name="qui")
     * @Template ()
     */
    public function getQui()
    {
        return $this->render('FleurBundle:Default:Qui.html.twig');
    }
    
    /**
     * @Route("/Contact", name="contact")
     * @Template ()
     */
    public function getContact()
    {
        return $this->render('FleurBundle:Default:Contact.html.twig');
    }
}