<?php

namespace PS\PlaneBundle\Tests;

use PS\PlaneBundle\Tests\AbstractTest;

class Exercise2Test extends AbstractTest
{

    public function setUp()
    {
        parent::setUp();
        $client = static::createClient();
        $client->request('POST', '/planes', array(
            'plane' => array(
                'name' => 'Air Force 2',
                'remainingFuel' => 1000,
                'passengerCount' => 100,
                'currentLocation' => array(
                    'x' => 0,
                    'y' => 0
                )
            )
        ));
    }

    public function testTravel()
    {
        $client = static::createClient();

        $client->request('POST', '/plane/1/travel', array(
                'x' => 250,
                'y' => 500
        ));

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->log($response->getContent(), '2-1');

        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals($content['currentLocation'], array(250, 500));
        $this->assertEquals($content['remainingFuel'], 441);

        $client->request('POST', '/plane/1/travel', array(
                'x' => 1000,
                'y' => 1000
        ));

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->log($response->getContent(), '2-2');

        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
        $this->assertEquals($response->getStatusCode(), 400);
    }
}
