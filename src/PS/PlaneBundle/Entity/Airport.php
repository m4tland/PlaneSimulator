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
     * @ORM\Column(name="locationX", type="integer", nullable=true)
     */
    protected $locationX;

    /**
     * @ORM\Column(name="locationY", type="integer", nullable=true)
     */
    protected $locationY;

    /**
     * @ORM\Column(name="readyToBoardPassengers", type="integer", nullable=true)
     */
    protected $readyToBoardPassengers;

    /**
     * @ORM\Column(name="outPassengers", type="integer", nullable=true)
     */
    protected $outPassengers;

    /**
     * @ORM\OneToMany(targetEntity="PS\PlaneBundle\Entity\Plane", mappedBy="airport")
     */
    protected $planes;

    public function __construct()
    {
        $this->planes = new ArrayCollection();
    }
}
