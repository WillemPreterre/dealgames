<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Category;
use App\Repository\AnnonceRepository;
use App\Repository\CategoryRepository;
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
            'TitlePage' => 'Page d\'accueil',
        ]);
    }

    
    /**
     * @Route("/category/{category_name}", name="app_category")
     */
    public function category(Category $category, AnnonceRepository $annonceRepository, Request $request, PaginatorInterface $paginatorInterface): Response

{
        $annonces = $paginatorInterface->paginate(
            $annonces = $annonceRepository->findCategoryForLink($category->getCategoryName()),
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );


        return $this->render('front/index.html.twig', [
            'annonces' => $annonces,
            'TitlePage' => ucfirst($category->getCategoryName()),

        ]);
    }


    /**
     * @Route("/profile/myAnnonceLink", name="app_myannonce")
     */
    public function myAnnonce(AnnonceRepository $annonceRepository,PaginatorInterface $paginatorInterface, Request $request) {
        $user = $this->getUser();
        // $annonceRepository->findMyAnnonceForUser($user) ;

        $annonces = $paginatorInterface->paginate(
            $annonces = $annonceRepository->findMyAnnonceForUser($user) ,
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );
        return $this->render('front/index.html.twig', [
            'annonces' => $annonces,
            'TitlePage' => 'Page des annonces'
        ]);
     }

    /**
     * @Route("/myAccount", name="app_myaccount")
     */
    public function myAccount()
    {
        return $this->render('myAccount.html.twig');
    }
}

