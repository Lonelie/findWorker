<?php

namespace FindWorkerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class MainController
 * @package FindWorkerBundle\Controller
 */
class MainController extends Controller
{
    /**
     * Page d'accueil
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepageAction()
    {
        return $this->render('FindWorkerBundle:Main:homepage.html.twig');
    }

    /**
     * Page contact
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction()
    {
        return $this->render('FindWorkerBundle:Main:contact.html.twig');
    }
}