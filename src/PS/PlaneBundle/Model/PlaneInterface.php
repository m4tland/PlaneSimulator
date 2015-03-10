<?php

namespace PS\PlaneBundle\Model;

interface PlaneInterface
{
    public function getCurrentLocation();
    public function getPassengerCount();
    public function getRemainingFuel();
}
