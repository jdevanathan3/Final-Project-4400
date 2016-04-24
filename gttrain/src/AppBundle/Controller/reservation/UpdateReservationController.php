<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpdateReservationController extends Controller
{
    private function db_getReservation($reservationID) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM Station");
        return $result->fetch_all();
    }

    /**
     * @Route("/reservation/select")
     * @Method({"GET"})
     */
    public function showSelectTicket(Request $request) {
        $reservationID = $request->query->get('reservationID');
        $html = $this->container->get('templating')->render('reservation/updateReservation_select.html.twig', array("reservationID" => $reservationID));
        return new Response($html);
    }
    
    /**
     * @Route("/reservation/update", name = "reservationUpdate")
     */
    public function goToUpdateReservation() {
        $html = $this->container->get('templating')->render('reservation/updateReservation_update.html.twig');
        return new Response($html);
    }
}

?>
