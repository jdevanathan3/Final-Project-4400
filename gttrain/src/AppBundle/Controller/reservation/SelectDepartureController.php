<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use \mysqli;

class SelectDepartureController extends Controller
{
    /**
     * @Route("/reservation/selectDeparture", name="selectDeparture")
     * @Method({"GET"})
     */
    public function show(Request $request)
    {
        $inputs = array(
            "departStation" => $request->query->get('departStation'),
            "arriveStation" => $request->query->get('arriveStation'),
            "date" => $request->query->get('date')
        );
        $stations = [];
        $html = $this->container->get('templating')->render(
            'reservation/selectDeparture.html.twig',
            array("inputs" => $inputs)
        );
        return new Response($html);
    }
	
	/**
         * @Route("/reservation/selectDeparturePost", name="selectDeparturePost")
         * @Method({"GET"})
	 */ 
	public function processPost(Request $request, array $args = ["dope", "patrick-senpai"]) {

       
	}

    private function db_getTrains() {
        $query = "SELECT Stop.Train_Number, Stop.Name as StartStop, Stop.Departure_Time, OtherStops.Name as EndStop, OtherStops.Arrival_Time as OtherArrival," .
                    "SEC_TO_TIME((SUM(TIME_TO_SEC(OtherStops.Arrival_Time))) - (SUM(TIME_TO_SEC(Stop.Departure_Time)))) as Duration" .
                    "FROM Stop" .
                    "Inner Join Stop as OtherStops" .
                    "On Stop.Train_Number = OtherStops.Train_Number" .
                    "Where (Stop.Name != OtherStops.Name) AND" .
                    "(Stop.Name Like '" . $startStation . "') AND" .
                    "(Stop.Departure_Time is not null) AND" .
                    "(OtherStops.Name Like '" . $endStation . "') AND" .
                    "(OtherStops.Arrival_Time is not null)" .
                    "Group BY Stop.Train_Number";
    }
	
}

?>



