<?php

namespace App\Controller;

use App\Repository\ResponsableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResponsableController extends AbstractController
{
    #[Route('/responsable', name: 'responsable')]
    public function index(ResponsableRepository $repository ): Response
    {
        $responsables = $repository->findAll();
        return $this->render('responsable/index.html.twig', [
            'controller_name' => 'ResponsableController',
            'responsables' => $responsables
        ]);
    }
}
