<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use App\Repository\NoteRepository;
use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/bookings', name: 'admin_bookings')]
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
#[Route('/admin/notes', name: 'admin_notes')]
public function adminNotes(NoteRepository $noteRepository, PaginatorInterface $paginator, Request $request): Response
{
    $notes = $paginator->paginate(
        $noteRepository->findAll(),
        $request->query->getInt('page', 1),
        100
    );

    return $this->render('admin/notes.html.twig', [
        'notes' => $notes,
    ]);
}

#[Route('/admin/posts/read', name: 'admin_posts_read')]
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

#[Route('/admin/posts/create', name: 'admin_posts_create')]
public function adminPostsCreate(PostRepository $postRepository): Response
{
    return $this->render('admin/posts_create.html.twig');
}
}
