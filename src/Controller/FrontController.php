<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/myAnnonceLink", name="app_myannonce")
     */

    public function myAnnonceLink()
    {
        return $this->render('myAnnonceLink.html.twig');
    }
    /**
     * @Route("/myAccount", name="app_myaccount")
     */

    public function myAccount()
    {
        return $this->render('myAccount.html.twig');
    }

}
