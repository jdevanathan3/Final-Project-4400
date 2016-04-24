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
     * @Route("/reservation/travelInfo" , name="travelInfo")
     * @Method({"GET"})
     */
    public function show(Request $request)
    {
        $inputs = array(
            "trainNumber" => $request->query->get('trainNumber'),
            "trainClass" => $request->query->get('trainClass'),
            "date" => $request->query->get('date'),
            "departStation" => $request->query->get('departStation'),
            "arriveStation" => $request->query->get('arriveStation')
        );
        $html = $this->container->get('templating')->render(
            'reservation/travelInfo.html.twig',
            array("inputs" => $inputs)
        );
        return new Response($html);
    }
    /**
     * @Route("/reservation/travelInfo")
     * @Method({"POST"})
     *
     */
    public function processPost(Request $request) {

        $this->postReserves($request);
        return $this->redirectToRoute('makeReservation', [],
            302);
    }

    private function postReserves(Request $request) {
        $trainNumber = $request->request->get('trainNumber');
        $trainClass = $request->request->get('trainClass');
        $date = $request->request->get('date');
        $baggage = $request->request->get('baggage');
        $passengerName = $request->request->get('passenger_name');
        $reservationId = $_SESSION['reservationId'];
        $departStation = $request->request->get('departStation');
        $arriveStation = $request->request->get('arriveStation');
        var_dump($departStation);
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $query = "INSERT INTO `Reserves` (`ReservationID`, `Train_Number`, `Class`, `Departure_Date`, `Passenger_Name`, `Number_Bags`, `Departs_From`, `Arrives_At`) 
        VALUES ('".$reservationId."', '".$trainNumber."', '".$trainClass."', '".$date."', '".$passengerName."',
         '".$baggage."', '".$departStation."', '".$arriveStation."')";
        $db->query($query);
    }
}
?>



