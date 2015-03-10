<?php

namespace PS\PlaneBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Exercise1Test extends WebTestCase
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
}
