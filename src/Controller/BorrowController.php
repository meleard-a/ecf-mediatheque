<?php

namespace App\Controller;
use App\Form\BorrowType;
use App\Classe\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BorrowController extends AbstractController
{
    #[Route('/reservation', name: 'borrow')]

    public function index(Cart $cart): Response
    {
        $form = $this->createForm(BorrowType::class);
        return $this->render('borrow/index.html.twig', [
          'form' => $form,
          'cart' => $cart->getFull()
        ]);
    }
}
