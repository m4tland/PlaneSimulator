<?php

namespace PS\PlaneBundle\Tests;

use PS\PlaneBundle\Tests\AbstractTest;

class Exercise1Test extends AbstractTest
{

    public function testCreate()
    {
        $client = static::createClient();

        $client->request('POST', '/planes', array(
            'plane' => array(
                'name' => 'Air Force 1',
                'remainingFuel' => 1000,
                'passengerCount' => 100,
                'currentLocation' => array(
                    'x' => 0,
                    'y' => 0
            ))
        ));

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->log($response->getContent(), '1');

        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );

        $this->assertEquals($response->getStatusCode(), 201);
        $this->assertEquals($content['name'], 'Air Force 1');
        $this->assertEquals($content['currentLocation'], array(0, 0));
    }
}
