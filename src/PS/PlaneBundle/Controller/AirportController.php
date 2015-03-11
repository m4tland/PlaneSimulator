<?php

namespace PS\PlaneBundle\Controller;

use PS\PlaneBundle\Entity\Airport;
use PS\PlaneBundle\Form\AirportType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    /**
     * Util function to get the form JSON error message
     */
    private function getFormErrorMessage(Form $form)
    {
        return array(
            'error' => (string) $form->getErrors(true, false)
        );
    }
}
