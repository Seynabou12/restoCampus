<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestoController extends AbstractController
{
    #[Route('/resto', name: 'resto')]
    public function index(): Response
    {
        return $this->render('resto/index.html.twig', [
            'controller_name' => 'RestoController',
        ]);
    }
    #[Route('/photos', name: 'photos')]
    public function photos(): Response
    {
        return $this->render('resto/index.html.twig', [
            'controller_name' => 'RestoController',
        ]);
    }

}
