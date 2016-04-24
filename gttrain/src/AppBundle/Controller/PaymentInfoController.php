<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \DateTime;
use \mysqli;

class PaymentInfoController extends Controller
{
    /**
     * @Route("/paymentInfo")
     */
    public function numberAction()
    { 
    
	//$selected_value="selected_value";
	//echo '<select name="select">';
	$cards = $this->db_getCardsForUser();
	var_dump($cards);
	//for($cards as $card) {
        
	//}


        $html = $this->container->get('templating')->render(

            'paymentInfo.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }


    /**
     * @Route("/getPaymentInfo", name = "getPaymentInfo")
     * @Method({"POST"})
     */
    public function getPaymentInfo(Request $request) {
	$cards = $this->db_getCardsForUser();
	var_dump($cards);
	$cardName = $request->request->get('cardName');
	$cardNumber = $request->request->get('cardNumber');
	$cardCVV = $request->request->get('cardCVV');
	$cardExpDate = $request->request->get('cardExpDate');
            $date = new DateTime();
	    $month = intval(strtok($cardExpDate, "/"));
	    $year = intval(strtok("/"));
            $date->setDate($year, $month, 1);
	$error_array = $this -> findErrors($cardName,$cardNumber, $cardCVV, $date);
	if(count($error_array) == 0) {
            $html = $this->container->get('templating')->render(
                'paymentInfo.html.twig',
                 array('luckyNumberList' => 1)
            );
	    $this -> db_insertCard($cardNumber, $cardCVV, $date, $cardName);
	} else {
            $html = $this->container->get('templating')->render(
                'paymentInfo.html.twig', $error_array
            );
        }
        return new Response($html);
    }

    private function db_getCardsForUser() {
         $user = $this->get('security.token_storage')->getToken()->getUser();
         $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
	 $db->query("SELECT CardNumber FROM Payment_Info WHERE Username='" . $user . "')");
    }

    private function db_insertCard($cardNumber, $cardCVV, $date, $cardName) {
         $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
         $user = $this->get('security.token_storage')->getToken()->getUser();
	 $db->query("INSERT INTO Payment_Info (Card_Number, Username, CVV, Exp_Date, nameOnCard) VALUES ('" . $cardNumber . "','" . $user . "','" . $cardCVV . "','" . $date->format('Y-m-d H:i:s')
		    . "','" . $cardName . "')");
    }

    private function findErrors($cardName, $cardNumber, $cardCVV, $cardExpDate) {
        $error_array = [];

        // if cardName is invalid 
        if($cardName == null) {
            $error_array['CARDNAME_INVALID'] = true;
        }
        
        // if cardNumber is invalid 
        if($cardNumber == NULL || !preg_match("/(\d){16}/", $cardNumber, $output_array)) {
            $error_array['CARDNUMBER_INVALID'] = true;
        }

        // if cardCVV is invalid 
        if($cardCVV == NULL || !preg_match("/(\d){3}/", $cardCVV, $output_array)) {
            $error_array['CARDCVV_INVALID'] = true;
        }
        
        // if expirationDate is invalid 

        if($cardExpDate == NULL) {
            $error_array['CARDEXPDATE_INVALID'] = true;
        } else {
	    if($cardExpDate->getTimestamp() <= (time() - 60*60*24)) { 
	        $error_array['CARDEXPDATE_INVALID'] = true;	    
	    } 
	}
	if(count($error_array) > 0) {
		$error_array['PAYMENT_FAILED'] = true;
	}
        return $error_array;
    }
}
?>



