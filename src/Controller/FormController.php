<?php
// src/Controller/FormController.php
namespace App\Controller;

use App\Event\ArticlePublishedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use App\Entity\Article;

class FormController extends AbstractController
{
    public function __construct( private EntityManagerInterface $entityManager)
    {
    }

    /**
     * @Route("/form/new")
     */
    public function new(Request $request,EventDispatcherInterface $eventDispatcher )
    {
        $article = new Article();
//        $article->setTitle('Hello World');
//        $article->setContent('Un très court article.');
//        $article->setNote(20);

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($article);
            $this->entityManager->flush();
            $event = new ArticlePublishedEvent($article);
            $eventDispatcher->dispatch($event);
        }
        return $this->render('form/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}