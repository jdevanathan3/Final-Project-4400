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
     * @Route("/selectDeparture")
	 * 
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'selectDeparture.html.twig',
            array('luckyNumberList' => 1)
        );
        return new Response($html);
    }
	
	/**
     * @Route("/selectDeparture")
     * @Method({"POST"})
     */
	public function processPost(Request $request) {
        
        $departStation = $request->request->get('departStation');
		var_dump($departStation);
       
    }
	
}

?>



