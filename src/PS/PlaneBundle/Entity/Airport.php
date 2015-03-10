<?php

namespace PS\PlaneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PS\PlaneBundle\Model\AbstractAirport;

/**
 * @ORM\Entity()
 */
class Airport extends AbstractAirport
{
    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $id;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $location;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $readyToBoardPassengers;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $outPassengers;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $planes;
}
