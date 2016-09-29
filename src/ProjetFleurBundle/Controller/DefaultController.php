<?php

namespace ProjetFleurBundle\Controller;

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
        return $this->render('ProjetFleurBundle:Default:Accueil.html.twig');
    }
    
    /**
     * @Route("/Qui", name="qui")
     * @Template ()
     */
    public function getQui()
    {
        return $this->render('ProjetFleurBundle:Default:Qui.html.twig');
    }
    
    /**
     * @Route("/Contact", name="contact")
     * @Template ()
     */
    public function getContact()
    {
        return $this->render('ProjetFleurBundle:Default:Contact.html.twig');
    }
}
