<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\reservation;

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
     * @Method({"GET"})
     */
    public function show()
    {

    }
	
	/**
         * @Route("/selectDeparturePost", name="selectDeparturePost")
         * @Method({"GET"})
	 */ 
	public function processPost(Request $request, array $args = ["dope", "patrick-senpai"]) {

       
	}
	
}

?>



