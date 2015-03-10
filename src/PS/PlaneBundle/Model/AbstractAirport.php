<?php

namespace PS\PlaneBundle\Model;

use PS\PlaneBundle\Model\AirportInterface;

abstract class AbstractAirport implements AirportInterface
{
    protected $id;
    protected $location;
    protected $readyToBoardPassengers;
    protected $outPassengers;
    protected $planes;

    public function getId()
    {
        return $this->id;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation(Location $location)
    {
        $this->location = $location;

        return $this;
    }

    public function getReadyToBoardPassengers()
    {
        return $this->readyToBoardPassengers;
    }

    public function setReadyToBoardPassengers($passengers)
    {
        $this->readyToBoardPassengers = $passengers;

        return $this;
    }

    public function getOutPassengers()
    {
        return $this->outPassengers;
    }

    public function setOutPassengers($passengers)
    {
        $this->outPassengers = $passengers;

        return $this;
    }

    public function getPlanes()
    {
        return $this->planes;
    }

    public function setPlanes(ArrayCollection $planes)
    {
        $this->planes = $planes;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->readyToBoardPassengers = rand(1, 1000);
    }
}
