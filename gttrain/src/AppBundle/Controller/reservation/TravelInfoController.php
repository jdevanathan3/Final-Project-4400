<?php
// src/AppBundle/Controller/LoginController.php]
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use \mysqli;

class TravelInfoController extends Controller
{
    /**
     * @Route("/reservation/travelInfo")
     * @Method({"GET"})
     */
    public function show()
    {
        $html = $this->container->get('templating')->render(
            'reservation/travelInfo.html.twig',
            array("stations" => [])
        );
        return new Response($html);
    }
    /**
     * @Route("/reservation/travelInfo")
     * @Method({"POST"})
     *
     */
    public function processPost(Request $request) {
        $departStation = $request->request->get('departStation');
        $arriveStation = $request->request->get('arriveStation');
        $date = $request->request->get('reservationDate');

        return $this->redirectToRoute('selectDeparture',
            ["departStation" => $departStation, "arriveStation" => $arriveStation, "reservationDate" => $date],
            302);
    }
}
?>



