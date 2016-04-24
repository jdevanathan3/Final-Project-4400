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

class RevenueReportController extends Controller
{
    /**
     * @Route("/revenueReport")
     */
    public function getRevenueDisplay()
    {
        $results = $this->getRevenue();
        for($x =0; $x < count($results); $x++) {
            $var = $results[$x];
            switch($var[0]) {
                case 1:
                    $results[$x][0] = "January";
                    array_push($results, "January", $var[1]);
                    break;
                case 2:
                    $results[$x][0] = "February";
                    break;
                case 3:
                    $results[$x][0] = "March";
                    break;
                case 4:
                    $results[$x][0] = "April";
                    break;
                case 5:
                    $results[$x][0] =  "May";
                    break;
                case 6:
                    $results[$x][0] = "June";
                    break;
                case 7:
                    $results[$x][0] = "July";
                    break;
                case 8:
                    $results[$x][0] = "August";
                    break;
                case 9:
                    $results[$x][0] = "September";
                    break;
                case 10:
                    $results[$x][0] = "October";
                    break;
                case 11:
                    $results[$x][0] = "Novemeber";
                    break;
                case 12:
                    $results[$x][0] = "December";
                    break;
            }
        }
        $html = $this->container->get('templating')->render(
            'revenueReport.html.twig',
            array("results" => $results)
        );
        return new Response($html);
    }

    public function getRevenue() {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("Select Month(EarliestMonth) as Months, Sum(Price) From ( SELECT Reservation.ReservationID, Reservation.Username, Reservation.Price, Min(Reserves.Departure_Date) as EarliestMonth	FROM `Reservation` Join Reserves ON	Reservation.ReservationID = Reserves.ReservationID GROUP BY Reservation.ReservationID )Prices GROUP By Month(EarliestMonth)");
        return $result->fetch_all();
    }
}

?>



