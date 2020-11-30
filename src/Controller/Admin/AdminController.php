<?php

namespace App\Controller\Admin;

use App\Entity\Adopter;
use App\Entity\Animal;
use App\Entity\Image;
use App\Entity\Race;
use App\Entity\Refuge;
use App\Entity\Specie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(AnimalCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SPA Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Menu');
        yield MenuItem::linkToCrud('Animals', 'fas fa-paw', Animal::class);
        yield MenuItem::linkToCrud('Adopters', 'fas fa-paw', Adopter::class);
        yield MenuItem::linkToCrud('Races', 'fas fa-paw', Race::class);
        yield MenuItem::linkToCrud('Species', 'fas fa-paw', Specie::class);
        yield MenuItem::linkToCrud('Refuges', 'fas fa-paw', Refuge::class);
    }
}
