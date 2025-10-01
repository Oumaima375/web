<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route(path:'/authorName/{name}', name: 'showAuthor')]
    public function showAuthor ($name):Response{
        return $this->render('author/show.html.twig',['nom'=>$name]);
    }
    #[Route(path:'/afficher', name: 'afficher')]
    public function afficher():Response{
        return new Response(content:'Hello');
    }
    #[Route(path:'/listauthor', name: 'listauthor')]
    public function listauthor($authors):Response{
        $authors = array(
        array('id' => 1, 'picture' => '/assets/images/Reyna.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/assets/images/nature.jpg','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/assets/images/esprit.png','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );

        return $this->render('author/show.html.twig',['author'=>$authors]);
    }
    #[Route('/authors', name: 'app_author_list')]
    public function listAuthors(): Response{
    $authors = [
        ['id' => 1, 'picture' => '/assets/img/esprit.png', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
        ['id' => 2, 'picture' => '/assets/img/nature.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
        ['id' => 3, 'picture' => '/assets/img/tunisia.png', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
    ];

    return $this->render('author/list.html.twig', [
        'authors' => $authors,
    ]);
    }
    #[Route('/author/details/{id}', name: 'app_author_details')]
    public function authorDetails(int $id): Response{
    $authors = [
        ['id' => 1, 'picture' => '/assets/img/esprit.png', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
        ['id' => 2, 'picture' => '/assets/img/nature.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
        ['id' => 3, 'picture' => '/assets/img/tunisia.png', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
    ];

    $author = $authors[$id] ?? null;

    if (!$author) {
        throw $this->createNotFoundException('Auteur introuvable');
    }

    return $this->render('author/showAuthor.html.twig', [
        'author' => $author,
    ]);
    }

}
