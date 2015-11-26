<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/teams');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            1,
            $crawler->filter('h1')->count()
        );

    }

    /**
     * @dataProvider dataProvider
     * @param $url
     * @param $code
     */
    public function testShow($url, $code)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $url);
        $this->assertEquals($code, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            1,
            $crawler->filter('h1')->count()
        );
    }

    public function dataProvider()
    {
        return [
            ['/team/commandname', 200],
            ['/team/commandname44', 404],
        ];
    }
}
