<?php
// src/AppBundle/Controller/LoginController.php]
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use \mysqli;

class SearchTrainController extends Controller
{
    /**
     * @Route("/reservation/searchTrain")
     * @Method({"GET"})
     */
    public function show(Request $request)
    {
		$stations = $this->db_getStations();
        $html = $this->container->get('templating')->render(
            'reservation/searchTrain.html.twig',
            array("stations" => $stations)
        );
        return new Response($html);
    }
	

	
    /**
     * @Route("/reservation/searchTrain")
     * @Method({"POST"})
     *
     */
	public function processPost(Request $request) {
        $departStation = $request->request->get('input_departStation');
        $reservationId = $request->request->get('reservationId');
        $arriveStation = $request->request->get('input_arriveStation');
        $date = $request->request->get('input_date');
        return $this->redirectToRoute('selectDeparture', 
            ["departStation" => $departStation, "arriveStation" => $arriveStation, "date" => $date],
            302);
        }
	
	private function db_getStations() {
		$db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
		$result = $db->query("SELECT * FROM Station");
		return $result->fetch_all();
	}
	

	
	

}


?>



