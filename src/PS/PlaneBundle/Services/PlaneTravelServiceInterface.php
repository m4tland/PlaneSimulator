<?php

namespace PS\PlaneBundle\Services;

use PS\PlaneBundle\Exception\NotEnoughFuelException;
use PS\PlaneBundle\Model\Location;
use PS\PlaneBundle\Model\PlaneInterface;

/**
 * Service responsible of moving a plane.
 */
interface PlaneTravelServiceInterface
{
    /**
     * Move a plane from its current location to another location.
     *
     * @param PlaneInterface $plane The plane to move
     * @param Location $location The target location
     *
     * @throws NotEnoughFuelException If the plane has not enough fuel
     */
    public function travel(PlaneInterface $plane, Location $target);
}
