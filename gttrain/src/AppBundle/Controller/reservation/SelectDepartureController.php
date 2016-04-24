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
        $trains = $this->db_getTrains($inputs['departStation'], $inputs['arriveStation']);
        $html = $this->container->get('templating')->render(
            'reservation/selectDeparture.html.twig',
            array("inputs" => $inputs, "trains" => $trains)
        );
        return new Response($html);
    }
	
	/**
         * @Route("/reservation/selectDeparture")
         * @Method({"POST"})
	 */ 
	public function processPost(Request $request) {
        $data = $request->request->get('input_trainRadio');
        $dataSplit = explode('_', $data);
        $trainNumber = $dataSplit[0];
        $trainClass = $dataSplit[1];
        $departStation = $dataSplit[3];
        $arriveStation = $dataSplit[4];
        $date = $dataSplit[2];
        $reservationId = $this->createReservation();
        return $this->redirectToRoute('travelInfo',
            ["trainNumber" => $trainNumber, "trainClass" => $trainClass, "date" => $date, 
                "reservationId" => $reservationId, "departStation" => $departStation, "arriveStation" => $arriveStation
            ],
            302);
	}

    private function db_getTrains($startStation, $endStation) {
        $query = "Select Total.Train_Number, Total.StartStop, Total.Departure_Time, Total.EndStop, Total.OtherArrival, Total.Duration,
Train_Route.1st_Class_price as FirstClass, Train_Route.2nd_Class_price as SecondClass
From
(
SELECT Stop.Train_Number, Stop.Name as StartStop, Stop.Departure_Time, OtherStops.Name as EndStop, OtherStops.Arrival_Time as OtherArrival, 
SEC_TO_TIME((SUM(TIME_TO_SEC(OtherStops.Arrival_Time))) - (SUM(TIME_TO_SEC(Stop.Departure_Time)))) as Duration
FROM Stop
Inner Join Stop as OtherStops
On Stop.Train_Number = OtherStops.Train_Number
Where (Stop.Name != OtherStops.Name) AND
(Stop.Name Like '".$startStation ."') AND
(Stop.Departure_Time is not null) AND
(OtherStops.Name Like '". $endStation . "') AND
(OtherStops.Arrival_Time is not null)
Group BY Stop.Train_Number
) As Total
Join Train_Route
On Train_Route.Train_Number = Total.Train_Number";
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query($query);
        return $result->fetch_all();

}

    private function createReservation() {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $maxID = $db->query("SELECT Max(ReservationID) + 1 as Max From Reservation")->fetch_assoc()['Max'];
        $user = $this->get('security.token_storage')->getToken()->getUser();
        //Get rid of debug $user value below
        $user = "anon";
        $card = $db->query("SELECT Payment_Info.Card_Number as Card FROM `Payment_Info` WHERE Payment_Info.Username Like '".$user."' Limit 1")
            ->fetch_assoc()['Card'];
        var_dump($card);
        $query = "INSERT INTO `Reservation` (`ReservationID`, `Card_Number`, `Username`, `IsCancelled`, `Price`, `ReserveDate`, `CancelDate`) VALUES ('".$maxID."',
         '".$card."', '".$user."', '0', '0', NULL, NULL)";
        $db->query($query);
        return $maxID;
    }
	
}

?>



