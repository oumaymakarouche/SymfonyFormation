<?php

// src/Service/FooService.php
namespace App\Services;

class FooService
{
    private $bar;
    private $baz;

    public function __construct(BarService $bar, BazService $baz)
    {
        $this->bar = $bar;
        $this->baz = $baz;
    }

    public function doSomething()
    {
        return $this->bar->getBar() . ' ' . $this->baz->getBaz();
    }
}
