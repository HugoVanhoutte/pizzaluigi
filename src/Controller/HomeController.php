<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_landing')]
    public function index(): Response
    {
        return $this->render('landing.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/waiting', name: 'app_waiting')]
public function waiting(): Response
    {
        return $this->render('waiting.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/menu', name: 'app_menu')]
public function menu(): Response
    {
        return $this->render('menu.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
