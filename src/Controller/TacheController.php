<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\TacheType;
use App\Entity\Tache;

//sujet 3 

class TacheController extends AbstractController
{
    #[Route('/', name: 'app_tache', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager)
    {
        $taches = $entityManager->getRepository(Tache::class)->findAll();
        return $this->render('taches/index.html.twig');
    }
    

    
    #[Route('/tache/newTache', name:'ajout_tache', methods: ['GET', 'POST'])]
    public function newTache(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory, Request $request)
    {
        $tache = new Tache();
    
        $form = $formFactory->create(TacheType::class, $tache);

        $form->handleRequest($request);
    
        return $this->render('taches/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
