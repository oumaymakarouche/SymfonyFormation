<?php

// src/EventListener/ArticlePublishedListener.php

namespace App\EventListener;

use App\Event\ArticlePublishedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ArticlePublishedListener implements EventSubscriberInterface
{

        public function __construct(
            public LoggerInterface $logger
    )
        {}
    public static function getSubscribedEvents()
    {
        return [
            ArticlePublishedEvent::class => 'onArticlePublished',
        ];
    }

    public function onArticlePublished(ArticlePublishedEvent $event)
    {
        // Ajouter du code pour traiter l'événement de l'article ajouté

        $article = $event->article;

        // For example, you could log the product data:
        $this->logger->info('New product added: '.$article->getTitle());
    }
}
