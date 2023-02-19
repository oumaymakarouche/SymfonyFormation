<?php

namespace App\Controller;

use App\Entity\Article;
use App\Event\ArticlePublishedEvent;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/create", name="article")
     */
    public function index(EventDispatcherInterface $eventDispatcher ,  EntityManagerInterface $entityManager): Response
    {
        // Créer un nouveau article
        $article = new Article();
        $article->setTitle('Produit 1');
        $article->setContent('test');
        $article->setNote(4);
        $entityManager->persist($article);
        $entityManager->flush();
        // Envoyer un événement pour signaler que le produit a été ajouté
        $event = new ArticlePublishedEvent($article);
        $eventDispatcher->dispatch($event);

        return $this->render('Article/index.html.twig', [
            'article' => $article,
        ]);
    }
    /**
     * @Route("/article", name="article1")
     */
    public function show(EventDispatcherInterface $eventDispatcher ,  ArticleRepository $articleRepository): Response

    {
        $articles= $articleRepository->findAll();
        return $this->render('Article/show.html.twig', [
            'articles' => $articles,
        ]);
    }
}