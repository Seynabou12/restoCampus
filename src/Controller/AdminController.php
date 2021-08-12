<?php

namespace App\Controller;

use App\Entity\Rsponsable;
use App\Entity\Responsable;
use App\Form\ResponsableType;
use App\Repository\RsponsableRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ResponsableRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
   

    public function __construct(ResponsableRepository $responsableRepository)
    {
    
        $this->responsableRepository=$responsableRepository;
    }

    #[Route('/admin', name: 'admin_index')]
    public function index(): Response
    {
        $responsable = $this->responsableRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'responsable' => $responsable
        ]);
    }
    
    #[Route('admin/edit/{id}', name:'admin_edit', methods: ['GET', 'POST'])]
    public function edit(Responsable $responsable, Request $request, EntityManagerInterface $em): Response
    {
            $form = $this->createForm(ResponsableType::class, $responsable);
            $form->handleRequest($request);
            //gerer la validité du formulaire
        if ($form->isSubmitted() && $form->isValid()) { 

            $em->flush();
            $this->addFlash('notice', 'insertion réussie');
            return $this->redirectToRoute('admin_index');

           
        }
        return $this->render("admin/edit.html.twig", [
            'form' =>$form->createView(), 
            'responsable'=>$responsable
            ]);
    }
    #[Route('admin/delete/{id}', name:'admin_delete')]
    public function delete(Responsable $responsable,EntityManagerInterface $em)
    {
        $em->remove($responsable);
        $em->flush();
        $this->addFlash('notice', 'suppression réussie');
        return $this->redirectToRoute('admin_index');
    }
}
