<?php

namespace PS\PlaneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PS\PlaneBundle\Model\AbstractPlane;

/**
 * @ORM\Entity(repositoryClass="PS\PlaneBundle\Entity\PlaneRepository")
 */
class Plane extends AbstractPlane
{

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $id;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $name;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $currentLocation;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $remainingFuel;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $passengerCount;
}
