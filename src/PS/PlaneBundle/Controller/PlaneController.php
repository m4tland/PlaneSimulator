<?php

namespace PS\PlaneBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlaneController extends Controller
{
    /**
     * Create a new plane.
     *
     * @Route("/planes")
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        // TODO
    }

    /**
     * Returns a plane by its id.
     *
     * @Route("/plane/{id}")
     * @Method({"GET"})
     */
    public function getAction(Request $request, $id)
    {
        // TODO
    }

    /**
     * Move a plane to a new location and returns it.
     *
     * @Route("/plane/{id}/travel")
     * @Method({"POST"})
     */
    public function travelAction(Request $request, $id)
    {
        // TODO
    }
}
