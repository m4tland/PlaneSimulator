<?php

namespace PS\PlaneBundle\Services;

use Doctrine\Common\Persistence\ObjectManager;
use PS\PlaneBundle\Event\LandingEvent;
use PS\PlaneBundle\Exception\NotEnoughFuelException;
use PS\PlaneBundle\Model\Location;
use PS\PlaneBundle\Model\PlaneInterface;
use PS\PlaneBundle\PlaneEvents;
use PS\PlaneBundle\Services\PlaneTravelServiceInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PlaneTravelService implements PlaneTravelServiceInterface
{

    /**
     * {@inheritdoc}
     */
    public function travel(PlaneInterface $plane, Location $target)
    {
        // TODO

        // Hint for exercise 3: use the method findOneByLocation()
        // on the AirportRepository
    }
}
