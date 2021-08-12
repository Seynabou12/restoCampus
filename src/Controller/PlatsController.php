<?php

namespace App\Controller;

use App\Entity\Plats;
//use App\Controller\CommentType;
use App\Entity\Comment;
use App\Form\PlatsType;
use App\Form\CommentType;
use App\Repository\PlatsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/plats')]
class PlatsController extends AbstractController
{
    #[Route('/', name: 'plats_index', methods: ['GET'])]
    public function index(PlatsRepository $platsRepository): Response
    {
        return $this->render('plats/index.html.twig', [
            'plats' => $platsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'plats_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $plat = new Plats();
        $form = $this->createForm(PlatsType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plat);
            $em->flush();

            return $this->redirectToRoute('plats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plats/new.html.twig', [
            'plat' => $plat,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'plats_show', methods: ['GET' , 'POST'])]
    public function show(Plats $plat, Request $request, EntityManagerInterface $em): Response
    {
        $comment = new Comment;

        //On génére le formulaire

        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        //traitement du formulaire
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {

        
           //$comment->setCreatedAt(new DateTime());
           $comment->setPlat($plat);
           //dd($comment);
           
           //$annonce->addComment($comment);
            $em->persist($comment);
            $em->flush();
   
            return $this->redirectToRoute('plats_show', ['id' => $plat->getId()]);
        }
    
        return $this->render('plats/show.html.twig', [
            'plat' => $plat,
            'commentForm' => $commentForm->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'plats_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Plats $plat): Response
    {
        $form = $this->createForm(PlatsType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plats/edit.html.twig', [
            'plat' => $plat,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'plats_delete')]
    public function delete(Plats $plat): Response
    {
        
            $em = $this->getDoctrine()->getManager();
            $em->remove($plat);
            $em->flush();
      
        $this->addFlash('notice', 'suppression réussie');

        return $this->redirectToRoute('plats_index');
    }
}
