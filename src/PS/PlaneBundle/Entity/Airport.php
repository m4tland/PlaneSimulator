<?php

namespace PS\PlaneBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use PS\PlaneBundle\Model\AbstractAirport;

/**
 * @ORM\Entity(repositoryClass="PS\PlaneBundle\Entity\AirportRepository")
 */
class Airport extends AbstractAirport
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
    protected $locationX;

    /**
     * TODO: Set the correct ORM mapping using annotations
     */
    protected $locationY;

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

    public function __construct()
    {
        $this->planes = new ArrayCollection();
    }
}
