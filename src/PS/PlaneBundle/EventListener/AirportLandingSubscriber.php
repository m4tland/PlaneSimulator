<?php

namespace PS\PlaneBundle\EventListener;

use PS\PlaneBundle\Event\LandingEvent;
use PS\PlaneBundle\PlaneEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AirportLandingSubscriber implements EventSubscriberInterface
{
    static function getSubscribedEvents()
    {
        return array(
            PlaneEvents::LANDING => 'onLanding'
        );
    }

    public function onLanding(LandingEvent $e)
    {
        // TODO
    }
}
