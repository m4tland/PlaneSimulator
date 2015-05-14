<?php

namespace PS\PlaneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use PS\PlaneBundle\Model\AbstractPlane;

/**
 * @ORM\Entity(repositoryClass="PS\PlaneBundle\Entity\PlaneRepository")
 * @ORM\Table(name="Plane")
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
     * @Assert\Length(
     *      min = "1",
     *      max = "100",
     *      minMessage = "The plane's name must be at least {{ limit }} characters length",
     *      maxMessage = "The plane's name cannot be longer than {{ limit }} characters length"
     * )
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="currentLocationX", type="integer", nullable=true)
     */
    protected $currentLocationX;

    /**
     * @ORM\Column(name="currentLocationY", type="integer", nullable=true)
     */
    protected $currentLocationY;

    /**
     * @Assert\GreaterThanOrEqual(
     *     value = 0
     * )
     * @ORM\Column(name="remainingFuel", type="integer", nullable=true)
     */
    protected $remainingFuel;

    /**
     * @Assert\GreaterThanOrEqual(
     *     value = 0
     * )
     * @ORM\Column(name="passengerCount", type="integer", nullable=true)
     */
    protected $passengerCount;

    /**
     * @ORM\ManyToOne(targetEntity="PS\PlaneBundle\Entity\Airport", inversedBy="planes")
     */
    protected $airport; //* @ORM\JoinColumn(nullable=false)
}
