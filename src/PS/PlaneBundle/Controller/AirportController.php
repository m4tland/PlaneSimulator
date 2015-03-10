<?php

namespace PS\PlaneBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AirportController extends Controller
{
    /**
     * Create a new airport.
     *
     * @Route("/airports")
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        // TODO
    }
}
