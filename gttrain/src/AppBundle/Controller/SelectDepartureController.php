<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use \mysqli;

class SelectDepartureController extends Controller
{
    /**
     * @Route("/selectDeparture", name="selectDeparture")
     * 
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'selectDeparture.html.twig',
            array('luckyNumberList' => 1)
        );
        return new Response("You are not on departure post.");
    }
	
	/**
         * @Route("/selectDeparturePost", name="selectDeparturePost")
         * @Method({"GET"})
	 */ 
	public function processPost(Request $request, array $args = ["dope", "patrick-senpai"]) {
        
        $departStation = $request->request->get('departStation');
        $arriveStation = $request->request->get('arriveStation');
        $reservationDate = $request->request->get('reservationDate');
	var_dump($departStation);
	var_dump($arriveStation);
	var_dump($reservationDate);
        $html = $this->container->get('templating')->render(
            'selectDeparture.html.twig',
            array('luckyNumberList' => 1)
        );
        return new Response("You are on departure post.");
       
	}
	
}

?>



