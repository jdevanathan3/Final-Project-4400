<?php
// src/AppBundle/Controller/LoginController.php]
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

class SearchTrainController extends Controller
{
	

	
    /**
     * @Route("/searchTrain")
     */
    public function show()
    {

		$stations = $this->db_getStations();
        $html = $this->container->get('templating')->render(
            'searchTrain.html.twig',
            array("stations" => $stations)
        );

        return new Response($html);
    }
	
	private function db_getStations() {
		$db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
		$result = $db->query("SELECT * FROM Station");
		return $result->fetch_all();
	}
	
	public function processPost(Request $request) {
        $departStation = $request->request->get('departStation');
        $arriveStation = $request->request->get('arriveStation');
        $date = $request->request->get('reservationDate');
		
		$html = $this->container->get('templating')->render('selectDeparture.html.twig');
		return new Response($html);
    }

	
	

}


?>



