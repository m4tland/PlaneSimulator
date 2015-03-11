<?php

namespace PS\PlaneBundle\Model;

use PS\PlaneBundle\Model\AirportInterface;
use PS\PlaneBundle\Model\PlaneInterface;

abstract class AbstractPlane implements PlaneInterface
{
    protected $id;
    protected $name;
    protected $currentLocationX;
    protected $currentLocationY;
    protected $remainingFuel;
    protected $passengerCount;

    // Exercise 3
    protected $airport;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getCurrentLocationX()
    {
        return $this->currentLocationX;
    }

    public function setCurrentLocationX($x)
    {
        $this->currentLocationX = $x;

        return $this;
    }

    public function getCurrentLocationY()
    {
        return $this->currentLocationY;
    }

    public function setCurrentLocationY($y)
    {
        $this->currentLocationY = $y;

        return $this;
    }

    public function getCurrentLocation()
    {
        $location = new Location();
        if ($this->currentLocationX && $this->currentLocationY) {
            $location->setX($this->currentLocationX);
            $location->setY($this->currentLocationY);
            return $location;
        }
        return $location;
    }

    public function setCurrentLocation(Location $location)
    {
        $this->currentLocationX = $location->getX();
        $this->currentLocationY = $location->getY();

        return $this;
    }

    public function getRemainingFuel()
    {
        return $this->remainingFuel;
    }

    public function setRemainingFuel($fuel)
    {
        $this->remainingFuel = $fuel;

        return $this;
    }

    public function getPassengerCount()
    {
        return $this->passengerCount;
    }

    public function setPassengerCount($passengers)
    {
        $this->passengerCount = $passengers;

        return $this;
    }

    public function setAirport(AirportInterface $airport)
    {
        $this->airport = $airport;

        return $this;
    }

    public function getAirport()
    {
        return $this->airport;
    }

    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'currentLocation' => array(
                $this->getCurrentLocation()->getX(),
                $this->getCurrentLocation()->getY()
            ),
            'remainingFuel' => $this->getRemainingFuel(),
            'passengerCount' => $this->getPassengerCount()
        );
    }
}
