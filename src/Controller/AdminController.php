<?php

namespace App\Controller;


use App\Repository\MenuRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    public function __construct(MenuRepository $userRepository)
    {
    
        $this->usersRepository=$userRepository;
    }

    #[Route('/admin', name: 'admin_index')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
    #[Route('admin/{id}', name:'admin_edit')]
    public function edit(): Response
    {
        return $this->render('admin/edit.html.twig');
    }
    
}
