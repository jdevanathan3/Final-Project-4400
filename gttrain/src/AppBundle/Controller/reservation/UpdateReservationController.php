<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpdateReservationController extends Controller
{
    /**
     * @Route("/reservation/search")
     */
    public function show()
    {
        $html = $this->container->get('templating')->render('reservation/updateReservation_search.html.twig');
        return new Response($html);
    }

    private function db_getReservation($reservationID) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM Station");
        return $result->fetch_all();
    }

    /**
     *@Route("/reservation/select")
     */
    public function goToSelectReservation() {
        $html = $this->container->get('templating')->render('reservation/updateReservation_select.html.twig');
        return new Response($html);
    }
    
    /**
     * @Route("/reservation/update")
     */
    public function goToUpdateReservation() {
        $html = $this->container->get('templating')->render('reservation/updateReservation_update.html.twig');
        return new Response($html);
    }
}

?>
