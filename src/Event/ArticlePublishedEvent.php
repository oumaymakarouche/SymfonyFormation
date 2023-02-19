<?php

// src/Event/ArticlePublishedEvent.php

namespace App\Event;

use App\Entity\Article;
use Symfony\Contracts\EventDispatcher\Event;

class ArticlePublishedEvent extends Event
{


    public function __construct(
        public Article $article,
    )
    {}


}
