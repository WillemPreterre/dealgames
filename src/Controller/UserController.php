<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Annonce;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("account/{id}", name="app_user_account", methods={"GET"})
     */
    
    public function show(User $user)
    {

        return $this->render('user.html.twig', [
            'user' => $user,
        ]);
    }
}