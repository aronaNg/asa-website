<?php

namespace App\Controller\Admin;

use App\Entity\News;
use App\Entity\Team;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/{_locale}/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle(' Admin ASA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToRoute('Interface utilisateur','fa fa-house-user','app_home');
      //  yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', News::class);

        yield MenuItem::section('Actualités');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer Actualité', 'fas fa-plus', News::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Consulter Actualités', 'fas fa-eye', News::class)
        ]);

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::subMenu('Actions', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Créer utilisateur', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Consulter Utilisateurs', 'fas fa-eye', User::class)
        ]);

        yield MenuItem::section('Équipe');
        yield MenuItem::subMenu('Actions', 'fas fa-users')->setSubItems([
            MenuItem::linkToCrud('Créer membre', 'fas fa-plus', Team::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Consulter membres', 'fas fa-eye', Team::class)
        ]);
    }
}
