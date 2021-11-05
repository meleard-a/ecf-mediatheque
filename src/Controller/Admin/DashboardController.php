<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Entity\Books;
use App\Entity\Borrow;
use App\Entity\TypeBook;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Médiathèque La Chapelle-Curreaux');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Livres', 'fas fa-book', Books::class);
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-list', TypeBook::class);
        yield MenuItem::linkToCrud('Auteur', 'fas fa-user', Author::class);
        yield MenuItem::linkToCrud('Réservations', 'fas fa-calendar', Borrow::class);
    }
}
