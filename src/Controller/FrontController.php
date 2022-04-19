<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{

/**
     * @Route("/", name="app_home")
     */
    public function index(AnnonceRepository $annonceRepository, EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {
        
        $annonces = $paginator->paginate(
            $annonceRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'annonces' => $annonces, 
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
