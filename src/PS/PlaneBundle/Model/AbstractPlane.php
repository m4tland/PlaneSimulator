<?php

namespace PS\PlaneBundle\Model;

use PS\PlaneBundle\Model\PlaneInterface;

abstract class AbstractPlane implements PlaneInterface
{
    protected $id;
    protected $name;
    protected $currentLocation;
    protected $remainingFuel;
    protected $passengerCount;

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

    public function getCurrentLocation()
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(Location $location)
    {
        $this->currentLocation = $location;

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
}
