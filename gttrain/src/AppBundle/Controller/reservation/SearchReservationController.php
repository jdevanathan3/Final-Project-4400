<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class SearchReservationController extends Controller
{
    /**
     * @Route("/reservation/search")
     */
    public function show()
    {
        $html = $this->container->get('templating')->render('reservation/updateReservation_search.html.twig');
        return new Response($html);
    }

    private function db_getReservation($reservationID)
    {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM Station");
        return $result->fetch_all();
    }

    /**
     * @Route("/reservation/processSearch", name = "processSearch");
     * @Method({"POST"})
     */
    public function processSearch(Request $request) {
        $reservationId = $request->request->get('reservationID');
	var_dump($reservationId);
        $_SESSION['reservationId'] = $reservationId;
        //$this->updateCardNumber($cardNumber, $reservationId);
        return $this->redirectToRoute('reservation/update',
            [],
            302);
    }   
}
?>
