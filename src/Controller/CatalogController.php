<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Books;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
      $this->entityManager = $entityManager;
    }

    #[Route('/catalogue', name: 'catalog')]
    public function index(): Response
    {

        $catalog = $this->entityManager->getRepository(Books::class)->findAll();

        return $this->render('catalog/index.html.twig', [
            'catalog' => $catalog
        ]);
    }

}
