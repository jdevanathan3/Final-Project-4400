<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use \mysqli;
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
	if($isValid) {
	    //search db for user
	    //var_dump( $this->get('security.token_storage')->getToken()->getUser());
	    //update user's isStudent field 
	    $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
            $db->query("UPDATE User SET isStudent = 1 WHERE Username='" . $this->get('security.token_storage')->getToken()->getUser() . "'"); 
        } else {
	    
	}	
        $html = $this->container->get('templating')->render(
            'addSchoolInfo.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
