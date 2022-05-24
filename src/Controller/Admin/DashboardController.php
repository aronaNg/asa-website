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
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
       //     ->setTitle('Asa App')
            ->setTitle('<img src="assets/asa.jpg" alt="Logo d\'ASA"> Admin ASA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('User interface','fa fa-house-user','app_home');
      //  yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', News::class);

        yield MenuItem::section('News');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create News', 'fas fa-plus', News::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show News', 'fas fa-eye', News::class)
        ]);

        yield MenuItem::section('Users');
        yield MenuItem::subMenu('Actions', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Create User', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Users', 'fas fa-eye', User::class)
        ]);

        yield MenuItem::section('Team');
        yield MenuItem::subMenu('Actions', 'fas fa-users')->setSubItems([
            MenuItem::linkToCrud('Create Team', 'fas fa-plus', Team::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Team', 'fas fa-eye', Team::class)
        ]);
    }
}
