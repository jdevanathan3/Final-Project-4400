<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class AddSchoolInfoController extends Controller
{
    /**
     * @Route("/addSchoolInfo")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'addSchoolInfo.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }

    /**
     * @Route("/getSchoolInfo"), name = "getSchoolInfo"
     * @Method({"POST"})
   */
    public function getSchoolInfo(Request $request) {
        $email = $request->request->get('schoolEmailID');
		
	//$html = $this->container->get('templating')->render('selectDeparture.html.twig');
	//return new Response($html);
        //$args = array(["departStation" => $departStation, "arriveStation" => $arriveStation, "date" => $date]);
        //return $this->redirectToRoute('selectDeparturePost', $args, 301);
	$isValid = filter_var($email, FILTER_VALIDATE_EMAIL); 

        $isValid = preg_match("/(\S)+.(edu)/", $email, $matches);
	var_dump($isValid);
        $html = $this->container->get('templating')->render(
            'addSchoolInfo.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
