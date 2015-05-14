<?php

namespace PS\PlaneBundle\Tests;

use PS\PlaneBundle\Tests\AbstractTest;

class Exercise3Test extends AbstractTest
{

    public function setUp()
    {
        parent::setUp();
        $client = static::createClient();
        $client->request('POST', '/planes', array(
            'plane' => array(
                'name' => 'Air Force 3',
                'remainingFuel' => 1000,
                'passengerCount' => 100,
                'currentLocation' => array(
                    'x' => 0,
                    'y' => 0
                )
            )
        ));
    }

    public function testCreate()
    {
        $client = static::createClient();

        $client->request('POST', '/airports', array(
                'location' => array(
                    'x' => 250,
                    'y' => 500
                ),
                'readyToBoardPassengers' => 256,
                'outPassengers' => 0,
                'planes' => array(1)
            
        ));

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);
        echo("blabla");
        echo($content);
        echo("blabla");
        $this->log($response->getContent(), '3-1');

        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
        $this->assertEquals($response->getStatusCode(), 201);
        $this->assertEquals($content['location'], array(250, 500));
        $this->assertTrue(isset($content['planes'][0]['name']));
        $this->assertEquals($content['planes'][0]['name'], 'Air Force 3');
    }

    /**
     * Test the landing of a plane in an airport
     */
    public function testLanding()
    {
        $client = static::createClient();

        $client->request('POST', '/airports', array(
            'location' => array(
                'x' => 250,
                'y' => 500
            ),
            'readyToBoardPassengers' => 256,
            'outPassengers' => 0,
            'planes' => array(1)
        ));

        $client->request('POST', '/airports', array(
            'location' => array(
                'x' => 125,
                'y' => 500
            ),
            'readyToBoardPassengers' => 10,
            'outPassengers' => 0,
            'planes' => array()
        ));

        // Travel the first plane to the first airport
        $client->request('POST', '/plane/1/travel', array(
            'x' => 250,
            'y' => 500
        ));

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->log($response->getContent(), '3-2');

        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
        // Assert that the plane has landed and boarded the correct number of
        // passengers
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals($content['currentLocation'], array(250, 500));
        $this->assertEquals($content['passengerCount'], 256);

        // Travel the first plane to the second airport
        $client->request('POST', '/plane/1/travel', array(
            array(
                'x' => 125,
                'y' => 500
            )
        ));

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->log($response->getContent(), '3-3');

        // Assert that the plane can't land on this airport
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
        $this->assertEquals($response->getStatusCode(), 400);
    }
}
