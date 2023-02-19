<?php

namespace App\twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class StarsRankingExtention extends AbstractExtension
{
    private $quotes = [
        'The greatest glory in living lies not in never falling, but in rising every time we fall. -Nelson Mandela',
        'The way to get started is to quit talking and begin doing. -Walt Disney',
        'Your time is limited, don\'t waste it living someone else\'s life. -Steve Jobs',
        'If life were predictable it would cease to be life, and be without flavor. -Eleanor Roosevelt',
        'If you look at what you have in life, you\'ll always have more. If you look at what you don\'t have in life, you\'ll never have enough. -Oprah Winfrey'
    ];
    public function getFilters()
    {
        return [
            new TwigFilter('stars', [$this, 'stars'],['is_safe'=>['html']]),
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('randomQuote', [$this, 'getRandomQuote']),
        ];
    }

    public function getRandomQuote()
    {
        return $this->quotes[array_rand($this->quotes)];
    }


    public function Stars($note)
    {
        $stars = '';
        for ($i = 0; $i < $note; $i++) {
            $stars .= '*';

        }
        return $stars;
    }

}