<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

class UpdateReservationController extends Controller
{
    private function db_getReservation($reservationID) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM Station");
        return $result->fetch_all();
    }

    /**
     * @Route("/reservation/select", name="reservationSelect")
     * @Method({"GET"})
     */
    public function showSelectTicket(Request $request) {
        $reservationID = $request->query->get('reservationID');
        $error = $request->query->get('error');
        $tickets = $this->db_getTickets($reservationID);
        $today = date('Y-m-d');
        for($i = 0; $i < count($tickets); $i++) {
            if($tickets[$i]['date'] == $today) {
                $tickets[$i]['disabled'] = 'true';
            } else {
                $tickets[$i]['disabled'] = 'false';
            }
        }
        $html = $this->container->get('templating')->render('reservation/updateReservation_select.html.twig', array("tickets" => $tickets, "reservationID" => $reservationID, "error" => $error));
        return new Response($html);
    }

    /**
     * @Route("/reservation/select")
     * @Method({"POST"})
     */
    public function processSelectTicket(Request $request) {
        $reservationID = $request->request->get('reservationID');
        $trainNumber = $request->request->get('trainNumberRadio');

        if($trainNumber == null) {
            return $this->redirectToRoute('reservationSelect',
                ["reservationID" => $reservationID, "error" => "selectError"],
                302);
        } else {
            return $this->redirectToRoute('reservationUpdate',
                ["reservationID" => $reservationID, "trainNumber" => $trainNumber],
                302);
        }
    }
    
    /**
     * @Route("/reservation/update", name = "reservationUpdate")
     * @Method({"GET"})
     */
    public function showUpdateReservation(Request $request) {
        $reservationID = $request->query->get('reservationID');
        $trainNumber = $request->query->get('trainNumber');
        $tickets = $this->db_getTickets($reservationID);
        $ticket = null;
        for($i=0; $i < count($tickets); $i++) {
            if($tickets[$i]['trainNumber'] == $trainNumber) {
                $ticket = $tickets[$i];
            }
        }
        $changeFee = $this->db_getChangeFee();
        $totalCost = $this->db_getReservationPrice($reservationID);
        $newTotalCost = $totalCost + $changeFee;

        $html = $this->container->get('templating')->render('reservation/updateReservation_update.html.twig', [
            "reservationID" => $reservationID,
            "trainNumber" => $trainNumber,
            "ticket" => $ticket,
            "changeFee" => $changeFee,
            "totalCost" => $totalCost,
            "newTotalCost" => $newTotalCost
        ]);
        return new Response($html);
    }

    /**
     * @Route("/reservation/update")
     * @Method({"POST"})
     */
    public function updateReservation(Request $request) {
        $reservationID = $request->request->get('out_reservationID');
        $trainNumber = $request->request->get('out_trainNumber');
        $newDate = $request->request->get('input_date');
        $newTotalCost = $request->request->get('out_newTotal');
        $this->updateTotalCost($newTotalCost, $reservationID);
        $this->updateTicketDate($reservationID, $trainNumber, $newDate);
        return $this->redirectToRoute('userDashboard');
    }

    private function db_getChangeFee() {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM System_Info WHERE Id='1'");
        $row = $result->fetch_assoc();
        return $row['Change_Fee'];
    }

    private function db_getReservationPrice($reservationID) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM Reservation WHERE ReservationID='" . $reservationID . "'");
        $row = $result->fetch_assoc();
        return $row['Price'];
    }
    //yuanhan code

    private function db_getTickets($reservationId)
    {
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
        return $tickets;
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
(Stop.Train_Number = '".$trainNumber."') AND
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
WHere Stop.Train_Number = '".$trainNumber."'")->fetch_assoc()['Cost'];
        $trainCost = floatval($trainCost);
        return $trainCost;
    }

    private function updateTotalCost($totalCost, $reservationId) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $query = "UPDATE `Reservation` SET `Price` = '".$totalCost."' WHERE `Reservation`.`ReservationID` = ".$reservationId;
        $db->query($query);
    }

    private function updateTicketDate($reservationID, $trainNumber, $newDate) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $query = "UPDATE `Reserves` SET `Departure_Date` = '". $newDate ."' WHERE `Reserves`.`ReservationID`='". $reservationID ."' AND `Reserves`.`Train_Number`='". $trainNumber ."'";
        $db->query($query);
    }
}

?>
