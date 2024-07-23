<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use App\Repository\NoteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/booking', name: 'app_booking')]
public function booking(): Response
    {
        return $this->render('booking.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/notes', name: 'app_notes')]
public function notes(NoteRepository $noteRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $notes = $paginator->paginate(
            $noteRepository->findAll(),
            $request->query->getInt('page', 1),
            50
        );
        return $this->render('notes.html.twig', [
            'controller_name' => 'HomeController',
            'notes' => $notes,
        ]);
    }

}
