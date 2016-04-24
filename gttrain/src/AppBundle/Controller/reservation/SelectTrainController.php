<?php
// src/AppBundle/Controller/LoginController.php]
namespace AppBundle\Controller\reservation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use \mysqli;

class SelectTrainController extends Controller
{
    /**
     * @Route("/selectTrain")
     * @Method({"GET"})
     */
    public function show()
    {
		$stations = $this->db_getStations();
        $html = $this->container->get('templating')->render(
            'reservation/selectTrain.html.twig',
            array("stations" => $stations)
        );

        return new Response($html);
    }
    /**
     * @Route("/selectTrain")
     * @Method({"POST"})
     *
     */
	public function processPost(Request $request) {
        $departStation = $request->request->get('departStation');
        $arriveStation = $request->request->get('arriveStation');
        $date = $request->request->get('reservationDate');

        var_dump($departStation);
        var_dump($arriveStation);
        var_dump($date);
        return $this->redirectToRoute('selectDeparture', 
            ["departStation" => $departStation, "arriveStation" => $arriveStation, "reservationDate" => $date], 
            302);
        }
	
	private function db_getStations() {
		$db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
		$result = $db->query("SELECT * FROM Station");
		return $result->fetch_all();
	}
	

	
	

}


?>



