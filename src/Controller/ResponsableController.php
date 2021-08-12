<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Entity\Rsponsable;
use App\Entity\Responsable;
use App\Form\ResponsableType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ResponsableRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\html;

class ResponsableController extends AbstractController
{
    #[Route('/responsable', name: 'responsables')]
    public function index(ResponsableRepository $repository ): Response
    {
        $responsables = $repository->findAll();
        return $this->render('responsable/index.html.twig', [
            'controller_name' => 'ResponsableController',
            'responsables' => $responsables
        ]);
    }

    #[Route('/show/{id}', name: 'responsable_show', methods: ['GET', 'POST'])]
    public function show (Responsable $responsable, Request $request, EntityManagerInterface $em)
    {
        $restaurant = new Restaurant;

        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $restaurant->setRsponsable($responsable);
           
            $em->persist($restaurant);
            $em->flush();

            return $this->redirectToRoute('plats_index', ['id' => $responsable->getId()]);
        }
         return $this->render('restaurant/show.html.twig', [
             'restaurant' => $restaurant,
             'form' => $form ->createView()
         ]);
    }

    #[Route("/responsable/create", name: ("responsable_create"))]
    public function form(Request $request, EntityManagerInterface $em)
    {
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class, $responsable);
        $form->handleRequest($request);
        //tester si le formulaire est envoyer et valider
        if ($form->isSubmitted() && $form->isValid()) {
            //corrélation entre les objets
            //on persist et on enregistre l'annonce
            $em->persist($responsable);
            $em->flush();

            $this->addFlash('notice', 'insertion réussie');

            return $this->redirectToRoute('admin_index');
        }
            return $this->render("responsable/create.html.twig", [
                'form' => $form->createView(),
            ]);
       
    }
    
    #[Route( '/{id}/edit', name :'responsable_edit')]
     public function edit(Request $request, Responsable $responsable): Response
    {
        $form = $this->createForm(ResponsableType::class, $responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/edit.html.twig', [
            'restaurant' => $responsable,
            'form' => $form,
        ]);
    }
    
    #[Route('responsable/delete/{id}', name: 'responsable_delete')]

    public function delete(Responsable $responsable, EntityManagerInterface $em)

    {
        $em->remove($responsable);
        $em->flush();
        $this->addFlash('notice', 'suppression réussie');
        return $this->redirectToRoute('admin_index');
    }
}
