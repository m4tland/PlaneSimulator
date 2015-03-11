<?php

namespace PS\PlaneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PS\PlaneBundle\Model\AbstractPlane;

/**
 * @ORM\Entity(repositoryClass="PS\PlaneBundle\Entity\PlaneRepository")
 */
class Plane extends AbstractPlane
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $name;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $currentLocationX;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $currentLocationY;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $remainingFuel;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $passengerCount;

    /**
     * Exercise 3 only
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $airport;
}
