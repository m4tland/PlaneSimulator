<?php

namespace PS\PlaneBundle\Controller;

use FOS\RestBundle\View\View;
use PS\PlaneBundle\Entity\Plane;
use PS\PlaneBundle\Exception\NotEnoughFuelException;
use PS\PlaneBundle\Form\LocationType;
use PS\PlaneBundle\Form\PlaneType;
use PS\PlaneBundle\Model\Location;
use PS\PlaneBundle\Services\PlaneTravelService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $plane = new Plane();
        //création du formulaire
        $form = $this->createForm(new PlaneType(), $plane);

        //vérification méthode POST : pas vraiment utile (annotation)
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $plane = $form->getData();

                //persistance en BDD
                $em = $this->getDoctrine()->getManager();
                $em->persist($plane);
                $em->flush();

                //réponse JSON
                $response = new JsonResponse($plane->toArray());
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
     * Move a plane to a new location and returns it.
     *
     * @Route("/plane/{id}/travel")
     * @Method({"POST"})
     */
    public function travelAction(Request $request, $id)
    {
        //récupération de l'avion
        $repository = $this->getDoctrine()
                ->getRepository('PSPlaneBundle:Plane');
        $plane = $repository->find($id);
        
        //récupération de la target
        $target = new Location();
        $target->setX($request->request->get('x'));
        $target->setY($request->request->get('y'));

        //récupération du service
        $traveler = new PlaneTravelService();

        try{
            //déplacement
            $plane = $traveler->travel($plane, $target);

            //update de la position en BD
            $em = $this->getDoctrine()->getManager();
            $em->persist($plane);
            $em->flush();

            $response = new JsonResponse($plane->toArray());
            $response->setStatusCode(200);
            return $response;

        } catch(\Exception $e){
            //erreur lors du déplacement
            $response = new JsonResponse($e->getMessage());
            $response->setStatusCode(400);
            return $response;
        }
        
    }

    /**
     * Util function to get the form error message
     */
    private function getFormErrorMessage(Form $form)
    {
        return array(
            'error' => (string) $form->getErrors(true, false)
        );
    }
}
