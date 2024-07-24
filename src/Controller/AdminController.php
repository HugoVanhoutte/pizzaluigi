<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use App\Repository\ReviewRepository;
use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    /**
     * Route displaying all bookings for admin uses
     * @param BookingRepository $bookingRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/bookings', name: 'bookings', methods: ['GET'])]
public function adminBookings(BookingRepository $bookingRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $bookings = $paginator->paginate(
            $bookingRepository->findAll(),
            $request->query->getInt('page', 1),
            100
        );

        return $this->render('admin/bookings.html.twig', [
            'bookings' => $bookings,
        ]);
    }

    /**
     * Route displaying all reviews for admin uses
     * @param ReviewRepository $reviewRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/reviews', name: 'reviews', methods: ['GET'])]
public function adminReviews(ReviewRepository $reviewRepository, PaginatorInterface $paginator, Request $request): Response
{
    $reviews = $paginator->paginate(
        $reviewRepository->findAll(),
        $request->query->getInt('page', 1),
        100
    );

    return $this->render('admin/reviews.html.twig', [
        'reviews' => $reviews,
    ]);
}

    /**
     * Route displaying all posts for admin uses
     * @param PostRepository $postRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/posts/read', name: 'posts_read', methods: ['GET'])]
public function adminPostsRead(PostRepository $postRepository, PaginatorInterface $paginator, Request $request): Response
{
    $posts = $paginator->paginate(
        $postRepository->findAll(),
        $request->query->getInt('page', 1),
        100
    );

    return $this->render('admin/posts_read.html.twig', [
        'posts' => $posts,
    ]);
}

    /**
     * Route to post creation form
     * @param PostRepository $postRepository
     * @return Response
     */
    #[Route('/posts/create', name: 'posts_create', methods: ['GET'])]
public function adminPostsCreate(PostRepository $postRepository): Response
{
    return $this->render('admin/posts_create.html.twig');
}
}
