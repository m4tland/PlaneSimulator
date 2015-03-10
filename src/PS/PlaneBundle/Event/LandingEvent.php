<?php

namespace PS\PlaneBundle\Event;

use PS\PlaneBundle\Model\AirportInterface;
use PS\PlaneBundle\Model\PlaneInterface;
use Symfony\Component\EventDispatcher\Event;

class LandingEvent extends Event
{
    private $plane;
    private $airport;

    public function __construct(PlaneInterface $plane, AirportInterface $airport)
    {
        $this->plane = $plane;
        $this->airport = $airport;
    }

    public function setPlane(PlaneInterface $plane)
    {
        $this->plane = $plane;

        return $this;
    }

    public function getPlane()
    {
        return $this->plane;
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

}
