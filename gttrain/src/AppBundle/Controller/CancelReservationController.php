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


class CancelReservationController extends Controller
{
    /**
     * @Route("/cancelReservation", name = "cancelReservation")
     */
    public function showReservation(Request $request)
    {
        $reservationId = $request->query->get('RIDCancellation');
        $reservationDate = $this->getReservation($reservationId);
        if ($reservationDate == NULL) {
            return $this->redirectToRoute('cancelError',
                [],
                302);
        }

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
                "trainNumber" => $row[0],
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
        $refundAmount = 0.0;
        $totalCost = $this->calculateTotalPrice($user, $totalPrice, $totalExtraBags);
        $currentDate = $this->getCurrenetDate();
        $difference = intval($this->getDateDifference($reservationDate));
        switch($difference) {
            case $difference > 7:
                $refundAmount = $totalCost * 0.8 - 50;
                break;
            default:
                $refundAmount = $totalCost * 0.5 - 50;
                break;
        }
        $html = $this->container->get('templating')->render(
            'cancelReservation.html.twig',
            array('tickets' => $tickets, 'totalCost' => $totalCost, 'currentDate' => $currentDate, 'totalCost' =>$totalCost,
                'refundAmount' => $refundAmount, 'reservationId' => $reservationId)
        );
        return new Response($html);
    }

    /**
     * @Route("/confirmCancel")
     *
     * @Method({"POST"})
     */
    public function processCancel(Request $request) {
        $reservationId = $request->request->get('reservationId');
        $totalAmount = floatval($request->request->get('totalCost'));
        $refundAmount = floatval($request->request->get('refundAmount'));
        $price = $totalAmount - $refundAmount;
        $this->deleteReservation($reservationId, $price);
        return $this->redirectToRoute('/user/dashboard',
            [],
            302);
    }


    /**
     * @Route("/cancelError", name = "cancelError")
     */
    public function showError() {
        $html = $this->container->get('templating')->render(
            'cancelError.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }

    private function getReservation($reservationId) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $query = "Select * From
(
Select Min(Reserves.Departure_Date) as EarliestDeparture From Reservation
Join Reserves
On Reservation.ReservationID = Reserves.ReservationID
Where Reservation.ReservationID = ".$reservationId." AND Reservation.IsCancelled = 0
    ) T
Where DATE_SUB(T.EarliestDeparture, INTERVAL 1 DAY) >= NOW()";
        $date = $db->query($query);
        if ($date->num_rows == 0) {
            return NULL;
        }
        return $date->fetch_assoc()['EarliestDeparture'];
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
On Stop.Train_Number Like OtherStops.Train_Number
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
Stop.Train_Number Like Train_Route.Train_Number
WHere Stop.Train_Number Like ".$trainNumber)->fetch_assoc()['Cost'];
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

    private function getCurrenetDate() {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $date = $db->query("Select Date(NOW()) as Date")->fetch_assoc()['Date'];
        return $date;
    }

    private function getDateDifference($date) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $difference = $db->query("Select DATEDIFF('".$date."', Date(now())) as Difference")->fetch_assoc()['Difference'];
        return $difference;
    }

    private function deleteReservation($reservationId, $price) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $query = "UPDATE `Reservation` SET `IsCancelled` = '1', `Price` = '".$price."', `CancelDate` = 'NOW()' WHERE `Reservation`.`ReservationID` = ".$reservationId;
        $db->query($query);
        $query = "DELETE FROM `Reserves` WHERE `Reserves`.`ReservationID` = ".$reservationId;
        $db->query($query);
    }
}

?>
