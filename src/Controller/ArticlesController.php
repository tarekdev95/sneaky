<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
       
        // Récupération des articles
        $articles = $articlesRepository->findAll();
        //var_dump($articles);die; 
        // Passage des articles à la vue
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}