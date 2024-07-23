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

class AdminController extends AbstractController
{
    #[Route('/admin/bookings', name: 'admin_bookings', methods: ['GET'])]
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
#[Route('/admin/reviews', name: 'admin_reviews', methods: ['GET'])]
public function adminReviews(ReviewRepository $reviewRepository, PaginatorInterface $paginator, Request $request): Response
{
    $reviews = $paginator->paginate(
        $reviewRepository->findAll(),
        $request->query->getInt('page', 1),
        100
    );

    return $this->render('reviews.html.twig', [
        'reviews' => $reviews,
    ]);
}

#[Route('/admin/posts/read', name: 'admin_posts_read', methods: ['GET'])]
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

#[Route('/admin/posts/create', name: 'admin_posts_create', methods: ['GET'])]
public function adminPostsCreate(PostRepository $postRepository): Response
{
    return $this->render('admin/posts_create.html.twig');
}
}
