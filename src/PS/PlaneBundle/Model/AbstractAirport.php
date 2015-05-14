<?php

namespace PS\PlaneBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use PS\PlaneBundle\Model\AirportInterface;

abstract class AbstractAirport implements AirportInterface
{
    protected $id;
    protected $locationX;
    protected $locationY;
    protected $readyToBoardPassengers;
    protected $outPassengers;
    protected $planes;

    public function getId()
    {
        return $this->id;
    }

    public function getLocationX()
    {
        return $this->locationX;
    }

    public function setLocationX($x)
    {
        $this->locationX = $x;

        return $this;
    }

    public function getLocationY()
    {
        return $this->locationY;
    }

    public function setLocationY($y)
    {
        $this->locationY = $y;

        return $this;
    }

    public function getLocation()
    {
        $location = new Location();
        if ($this->locationX && $this->locationY) {
            $location->setX($this->locationX);
            $location->setY($this->locationY);
            return $location;
        }
        return $location;
    }

    public function setLocation(Location $location)
    {
        $this->locationX = $location->getX();
        $this->locationY = $location->getY();

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

        foreach ($this->planes as $plane) {
            $plane->setAirport($this);
        }

        return $this;
    }

    public function addPlane(PlaneInterface $plane)
    {
        if (!$this->planes->contains($plane)) {
            $this->planes->add($plane);
            $plane->setAirport($this);
        }

        return $this;
    }

    public function removePlane(PlaneInterface $plane)
    {
        if ($this->planes->contains($plane)) {
            $this->planes->removeElement($plane);
            $plane->setAirport(null);
        }

        return $this;
    }

    public function toArray()
    {
        $planes = array();
        foreach ($this->getPlanes() as $plane) {
            $planes[] = $plane->toArray();
        }
        return array(
            'id' => $this->getId(),
            'location' => array(
                $this->getLocation()->getX(),
                $this->getLocation()->getY()
            ),
            'readyToBoardPassengers' => $this->getReadyToBoardPassengers(),
            'outPassengers' => $this->getOutPassengers(),
            'planes' => $planes
        );
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->readyToBoardPassengers = rand(1, 1000);
    }
}
