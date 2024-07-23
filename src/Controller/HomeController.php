<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use App\Repository\ReviewRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Route for, displaying landing page
     * @return Response
     */
    #[Route('/', name: 'app_landing', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('landing.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * Route for waiting screen
     * @return Response
     */
    #[Route('/waiting', name: 'app_waiting', methods: ['GET'])]
public function waiting(): Response
    {
        return $this->render('waiting.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * Route for displaying the menu
     * @return Response
     */
    #[Route('/menu', name: 'app_menu', methods: ['GET'])]
public function menu(): Response
    {
        return $this->render('menu.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * Route for displaying the booking creation form
     * @return Response
     */
    #[Route('/booking', name: 'app_booking', methods: ['GET'])]
public function booking(): Response
    {
        return $this->render('booking.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * Route for displaying the reviews, pagination included
     * @param ReviewRepository $reviewRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/reviews', name: 'app_reviews', methods: ['GET'])]
public function notes(ReviewRepository $reviewRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $reviews = $paginator->paginate(
            $reviewRepository->findAll(),
            $request->query->getInt('page', 1),
            50
        );
        return $this->render('reviews.html.twig', [
            'controller_name' => 'HomeController',
            'reviews' => $reviews,
        ]);
    }

}
