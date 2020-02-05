<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SmokeTest extends WebTestCase
{
    /**
    * @dataProvider provideValidUrls
    */
    public function testPageIsSuccessFull(string $url): void
    {
        $client = static::createClient();

        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideValidUrls(): iterable
    {
        return [
            ['/contact'],
            ['/shows'],
            ['/shows/stranger-things']
        ];
    }
}
