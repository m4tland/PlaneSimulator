<?php

namespace PS\PlaneBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlaneControllerTest extends WebTestCase
{

    public function testCreate()
    {
        $client = static::createClient();

        $client->request('POST', '/planes', array(), array(), array(),
            json_encode(array(
                'name' => 'Air Force 1',
                'remainingFuel' => 1000,
                'currentLocation' => array(0, 0)
            ))
        );
        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'));
        $this->assertTrue($response->getStatusCode(), 200);
    }

    public function testGet()
    {
        $client = static::createClient();

        $client->request('GET', '/plane/1');
        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'));
        $this->assertTrue($response->getStatusCode(), 200);
        $this->assertEquals($content['id'], 1);
        $this->assertEquals($content['name'], 'Air Force 1');
        $this->assertEquals($content['currentLocation'], array(0, 0));
    }

    public function testTravel()
    {
        $client = static::createClient();

        $client->request('POST', '/plane/1/travel', array(), array(), array(),
            json_encode(array(
                'x' => 250,
                'y' => 500
            )
        ));

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'));
        $this->assertTrue($response->getStatusCode(), 200);
        $this->assertEquals($content['currentLocation'], array(250, 500));
    }
}
