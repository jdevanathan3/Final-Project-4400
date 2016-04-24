<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class MakeReservationController extends Controller
{
    /**
     * @Route("/makeReservation", name="makeReservation")
     * @Method({"GET"})
     */
    public function showReservation(Request $request)
    {
        $reservationId = $_SESSION['reservationId'];
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $info = $this->getTickets($reservationId);
        $totalExtraBags = 0;
        $totalPrice = 0.0;
        $tickets = [];
        foreach ($info as $row) {
            $times = $this->db_getTrains($row[1], $row[2], $row[0]);
            $price = $this->getPrice($row[0], $row[3]);
            $totalPrice += $price;
            $ticket = array(
                "trainNumber" => "Train ".$row[0],
                "time" => ($times['Departure_Time']." - ".$times['OtherArrival']),
                "duration" => $times['Duration'],
                "date" => $row[6],
                "departsFrom" => $row[1],
                "arrivesAt" => $row[2],
                "class" => $row[3],
                "price" => "$".$price,
                "bags" => $row[4],
                "passenger" => $row[5]
            );
            array_push($tickets, $ticket);
            $bagNumber = intval($ticket['bags']);
            if ($bagNumber > 2) {
                $totalExtraBags += ($bagNumber - 2);
            }
        }
        $totalCost = $this->calculateTotalPrice($user, $totalPrice, $totalExtraBags);
        $cards = $this->getCards($user);
        $html = $this->container->get('templating')->render(
            'makeReservation.html.twig',
            array('tickets' => $tickets, 'totalCost' => $totalCost, 'cards' => $cards)
        );

        return new Response($html);
    }

    /**
     * @Route("/makeReservation")
     * @Method({"POST"})
     */
    public function processPost(Request $request) {
        $cardNumber = $request->request->get('cardNumber');
    }


    private function getTickets($reservationId) {
        $query = "SELECT Reserves.Train_Number, Reserves.Departs_From as DepartsFrom, Reserves.Arrives_At as ArrivesAt, Reserves.Class,
Reserves.Number_Bags as Bags, Reserves.Passenger_Name as Passenger, Reserves.Departure_Date FROM Reservation
Join Reserves ON
Reservation.ReservationID  = Reserves.ReservationID
Where Reservation.ReservationID = ".$reservationId."
Order By Reserves.Departure_Date ASC";
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query($query);
        return $result->fetch_all();
    }

    private function db_getTrains($startStation, $endStation, $trainNumber) {
        $query = "Select Total.Departure_Time, Total.OtherArrival, Total.Duration
From
(
SELECT Stop.Train_Number, Stop.Name as StartStop, Stop.Departure_Time, OtherStops.Name as EndStop, OtherStops.Arrival_Time as OtherArrival, 
SEC_TO_TIME((SUM(TIME_TO_SEC(OtherStops.Arrival_Time))) - (SUM(TIME_TO_SEC(Stop.Departure_Time)))) as Duration
FROM Stop
Inner Join Stop as OtherStops
On Stop.Train_Number = OtherStops.Train_Number
Where 
(Stop.Train_Number = ".$trainNumber.") AND
(Stop.Name != OtherStops.Name) AND
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
        return $result->fetch_assoc();
    }

    private function getPrice($trainNumber, $class){
        $classText = "";
        if ($class === "1") {
            $classText = "1st_Class_price";
        } else {
            $classText = "2nd_Class_price";
        }
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $trainCost = $db->query("Select DISTINCT Train_Route.".$classText." As Cost From Stop JOIN
Train_Route ON
Stop.Train_Number = Train_Route.Train_Number
WHere Stop.Train_Number = ".$trainNumber)->fetch_assoc()['Cost'];
        $trainCost = floatval($trainCost);
        return $trainCost;
    }

    private function calculateTotalPrice($user, $trainPrices, $extraBags) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $isStudent = $db->query("Select isStudent From User Where Username Like '".$user."'")->fetch_assoc()['isStudent'];
        $total = $trainPrices + $extraBags * 30.00;
        if ($isStudent === '1') {
            $total *= 0.8;
        }
        return $total;
    }

    private function getCards($user) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $query = "Select Card_Number as Card From Payment_Info Where Username Like '".$user."'";
        $cards = $db->query($query)->fetch_all();
        return $cards;
    }
}

?>
