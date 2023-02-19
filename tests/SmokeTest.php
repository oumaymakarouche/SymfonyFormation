<?php
// tests/Controller/SmokeTest.php
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Panther\PantherTestCase;

class SmokeTest extends WebTestCase
{

    public function testLogin()
    {
         //Commenting out this test for now
         $client = static::CreateClient();
        // $client->request('GET', '/login');
        // $this->assertSelectorTextContains('h1', 'Please sign in');
        $crawler= $client->request('GET', '/login');
        self::assertSame(1, $crawler->filter('html:contains("Please sign in")')->count());

    }

    // ...
}