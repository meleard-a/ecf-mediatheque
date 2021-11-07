<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Books;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchType;
use App\Classe\Search;
use Symfony\Component\HttpFoundation\Request;

class CatalogController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
      $this->entityManager = $entityManager;
    }

    #[Route('/catalogue', name: 'catalog')]
    public function index(Request $request): Response
    {

        $catalog = $this->entityManager->getRepository(Books::class)->findAll();

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $catalog = $this->entityManager->getRepository(Books::class)->findAll();
        }

        return $this->render('catalog/index.html.twig', [
            'catalog' => $catalog,
            'form' => $form->createView()
        ]);
    }

}
