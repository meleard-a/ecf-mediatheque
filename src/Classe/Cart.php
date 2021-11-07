<?php

namespace App\Classe;

use App\Entity\Books;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart 
{

  private $session;
  private $entityManager;

  public function __construct(EntityManagerInterface $entityManager, SessionInterface $session)
  {
    $this->session = $session;
    $this->entityManager = $entityManager;
  }

  public function add($id)
  {
    $cart = $this->session->get('cart', []);

    if (!empty($cart[$id])) {
      $cart[$id]++;
    } else {
      $cart[$id] = 1;
    }

    $this->session->set('cart', $cart);
  }

  public function get()
  {
    return $this->session->get('cart');
  }

  public function remove()
  {
    return $this->session->remove('cart');
  }

  public function delete($id)
  {
    $cart = $this->session->get('cart', []);

    unset($cart[$id]);

    return $this->session->set('cart', $cart);
  }

  public function getFull()
  {
    $cartComplete = [];

    foreach ($this->get() as $id => $quantity) {
      $book_object = $this->entityManager->getRepository(Books::class)->findOneById($id);

      if (!$book_object) {
        $this->delete($id);
        continue;
      }

      $cartComplete[] = [
        'book' => $book_object,
        'quantity' => $quantity
      ];
    }
    return $cartComplete;
  }
 }