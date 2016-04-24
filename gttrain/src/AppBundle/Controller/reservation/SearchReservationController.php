<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \mysqli;

class SearchReservationController extends Controller
{
    /**
     * @Route("/reservation/search")
     * @Method({"GET"})
     */
    public function show()
    {
        $html = $this->container->get('templating')->render('reservation/updateReservation_search.html.twig');
        return new Response($html);
    }

    private function db_getReservation($reservationID, $username)
    {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM Reservation WHERE ReservationID='" . $reservationID . "' AND Username='" . $username . "'");
        return $result->fetch_all();
    }

    /**
     * @Route("/reservation/search", name = "processSearch");
     * @Method({"POST"})
     */
    public function processSearch(Request $request) {
        $reservationId = $request->request->get('input_reservationNumber');
        $username = $this->get('security.token_storage')->getToken()->getUser();
        $errorArray = $this->errorCheck($reservationId, $username);
        if(count($errorArray) > 0) {
            $html = $this->container->get('templating')->render('reservation/updateReservation_search.html.twig', $errorArray);
            return new Response($html);
        } else {
            return $this->redirectToRoute('reservationUpdate', ["reservationID" => $reservationId], 302);
        }
    }

    private function errorCheck($reservationID, $username) {
        $errorArray = [];
        if ($reservationID == NULL) {
            $errorArray['RESERVATION_BLANK'] =  true;
        } else {
            $reservationInfo = $this->db_getReservation($reservationID, $username);

            if($reservationInfo == NULL) {
                $errorArray['RESERVATION_INVALID'] =  true;
            }
        }

        return $errorArray;
    }
}
?>
