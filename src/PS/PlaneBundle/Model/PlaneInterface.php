<?php

namespace PS\PlaneBundle\Model;

use PS\PlaneBundle\Model\Location;

interface PlaneInterface
{
    /**
     * Return the current location of the plane.
     *
     * @return Location
     */
    public function getCurrentLocation();

    /**
     * Set the current location of the plane.
     *
     * @param Location $location
     */
    public function setCurrentLocation(Location $location);

    public function getName();
    public function setName($name);

    public function getPassengerCount();
    public function setPassengerCount($count);

    public function setRemainingFuel($fuel);
    public function getRemainingFuel();
}
