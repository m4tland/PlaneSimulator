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
        $airport = new Airport();
        //création du formulaire
        $form = $this->createForm(new AirportType(), $airport);

        //vérification méthode POST : pas vraiment utile (annotation)
        if ($request->isMethod('POST')) {
            $form->submit($request->request->all());

            if ($form->isValid()) {
                $airport = $form->getData();

                //persistance en BDD
                $em = $this->getDoctrine()->getManager();
                $em->persist($airport);
                $em->flush();

                //réponse JSON
                $response = new JsonResponse($airport);
                $response->setStatusCode(201);

                return $response;
            }
        }

        //erreur
        $response = new JsonResponse($this->getFormErrorMessage($form));
        $response->setStatusCode(201);
        return $response;
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
