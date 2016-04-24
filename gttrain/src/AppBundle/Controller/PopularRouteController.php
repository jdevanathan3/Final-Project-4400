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

class PopularRouteController extends Controller
{
    /**
     * @Route("/popularRoute")
     */
    public function numberAction()
    {
        $results = $this->getPopularRoutes();
        $html = $this->container->get('templating')->render(
            'popularRoute.html.twig',
            array('results' => $results)
        );
        return new Response($html);
    }
    
    public function getPopularRoutes() {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("(Select MONTHNAME(STR_TO_DATE(Month(Reserves.Departure_Date), '%m')) as Months, Reserves.Train_Number, COUNT(DISTINCT Reserves.ReservationID, Reserves.ReservationID) as Counts, 
Month(Reserves.Departure_Date) as Month
From Reserves
Join Reservation on Reservation.ReservationID = Reserves.ReservationID
WHERE Reservation.IsCancelled = 0 and Month(Reserves.Departure_Date) = Month(Now())
Group By Reserves.Train_Number, Month
Order By Month Asc, Counts desc
Limit 3)
UNION ALL
(Select MONTHNAME(STR_TO_DATE(Month(Reserves.Departure_Date), '%m')) as Months, Reserves.Train_Number, COUNT(DISTINCT Reserves.ReservationID, Reserves.ReservationID) as Counts, 
Month(Reserves.Departure_Date) as Month
From Reserves
Join Reservation on Reservation.ReservationID = Reserves.ReservationID
WHERE Reservation.IsCancelled = 0 and Month(Reserves.Departure_Date) = (Month(Now()) - 1)
Group By Reserves.Train_Number, Month
Order By Month Asc, Counts desc
Limit 3)
UNION ALL
(Select MONTHNAME(STR_TO_DATE(Month(Reserves.Departure_Date), '%m')) as Months, Reserves.Train_Number, COUNT(DISTINCT Reserves.ReservationID, Reserves.ReservationID) as Counts, 
Month(Reserves.Departure_Date) as Month
From Reserves
Join Reservation on Reservation.ReservationID = Reserves.ReservationID
WHERE Reservation.IsCancelled = 0 and Month(Reserves.Departure_Date) = (Month(Now()) - 2)
Group By Reserves.Train_Number, Month
Order By Month Asc, Counts desc
Limit 3)
Order By Month Asc, Counts desc");
        return $result->fetch_all();
    }
}

?>



