<?php

namespace PS\PlaneBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use PS\PlaneBundle\Model\Location;

interface AirportInterface
{

    public function getLocation();
    public function setLocation(Location $location);

    public function getReadyToBoardPassengers();
    public function setReadyToBoardPassengers($passengers);

    public function getOutPassengers();
    public function setOutPassengers($passengers);

    /**
     * Get the planes that are authorized to land.
     *
     * @return ArrayCollection<PlaneInterface>
     */
    public function getPlanes();

    /**
     * Set planes that are authorized to land.
     *
     * @param ArrayCollection $planes
     */
    public function setPlanes(ArrayCollection $planes);

    /**
     * Reset the number of passengers ready to board.
     */
    public function reset();
}
