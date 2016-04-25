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
    private function populateCardSelect() {
	$query = $this->db_getCardsForUser();

	$cards = array();
	for ($x = 0; $x < $query->num_rows; $x++)
	{
	    $cards[$x] = $query->fetch_assoc();
	}
	return $cards;
    }

    /**
     * @Route("/paymentInfo")
     */
    public function show()
    { 
    
	//$selected_value="selected_value";
	//echo '<select name="select">';
        $cards = $this -> populateCardSelect();
	$error_array = array();
	$args = array("error"=>$error_array, "cards"=>$cards);
        $html = $this->container->get('templating')->render(

            'paymentInfo.html.twig',
           $args 
        );

        return new Response($html);
    }

    /**
     * @Route("getDeleteInfo", name="getDeleteInfo")
     * @Method({"POST"})
     */
    public function getDeleteInfo(Request $request)
    { 
    
	$cardNumber = $request->request->get('cardNumber');
        $error_array = $this -> tryToDelete($cardNumber); 
        $cards = $this -> populateCardSelect();
	$args = array("error"=>$error_array, "cards"=>$cards);
        $html = $this->container->get('templating')->render(

            'paymentInfo.html.twig',
           $args 
        );
	if(count($error_array) == 0) {
            return $this->redirectToRoute('makeReservation');
	}
        return new Response($html);
    }

    /**
     * @Route("/getPaymentInfo", name = "getPaymentInfo")
     * @Method({"POST"})
     */
    public function getPaymentInfo(Request $request) {
	$cards = $this->populateCardSelect();
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
	    if(!$this -> db_insertCard($cardNumber, $cardCVV, $date, $cardName)) {
	        $cards = $this -> populateCardSelect();
	        $args = array("error"=>$error_array, "cards"=>$cards);
                $html = $this->container->get('templating')->render(
                'paymentInfo.html.twig',
                $args);
		$error_array['PAYMENT_FAILED'] = true;
	    } else {
                return $this->redirectToRoute('makeReservation');
	    }
	}
	$args = array("error"=>$error_array, "cards"=>$cards);
        $html = $this->container->get('templating')->render(
            'paymentInfo.html.twig', $args
        );
        return new Response($html);
    }

    private function db_getCardsForUser() {
         $user = $this->get('security.token_storage')->getToken()->getUser();
         $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
	 $query = $db->query("SELECT * FROM Payment_Info WHERE Username='" . $user . "'");
	 return $query;
    }

    private function db_insertCard($cardNumber, $cardCVV, $date, $cardName) {
         $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
         $user = $this->get('security.token_storage')->getToken()->getUser();

	 $existingCards = $db->query("SELECT * FROM Payment_Info WHERE Card_Number = '" . $cardNumber . "'"); 
	 if($existingCards->num_rows > 0) {
		 return false;
	 } 

	 return $db->query("INSERT INTO Payment_Info (Card_Number, Username, CVV, Exp_Date, nameOnCard) VALUES ('" . $cardNumber . "','" . $user . "','" . $cardCVV . "','" . $date->format('Y-m-d H:i:s')
		    . "','" . $cardName . "')");
    }

    private function db_deleteCard($cardNumber) {
         $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
         $user = $this->get('security.token_storage')->getToken()->getUser();
	 //$existingCards = $db->query("SELECT * FROM Reservation WHERE Card_Number='" . $cardNumber . "' AND Username='" . $user . "'");
	$existingCards = $db->query("Select * From(
	Select Reservation.Card_Number, Max(Reserves.Departure_Date) as LatestDeparture From Reservation
	Join Reserves 
	On Reservation.ReservationID = Reserves.ReservationID
	Where Reservation.Card_Number = '" . $cardNumber  ."'
	GROUP By Reservation.ReservationID) Cards
	Where Cards.LatestDeparture > NOW()");
	 //var_dump($existingCards);
	 if($existingCards->num_rows == 0) {
	     $dopeness = $db->query("DELETE FROM Payment_Info WHERE Card_Number='" . $cardNumber . "' AND Username='" . $user . "'"); 
	     //var_dump($dopeness);
	     return true;
	 } else {
	     return false;
	 }
    }

    private function tryToDelete($cardNumber) {
        $error_array = [];
	if(!$this -> db_deleteCard($cardNumber)) {
		$error_array['DELETE_CARD_FAILED'] = true;
	}
        //var_dump($error_array);
        return $error_array;
    }

    private function findErrors($cardName, $cardNumber, $cardCVV, $cardExpDate) {
        $error_array = [];

        // if cardName is invalid 
        if($cardName == null) {
            $error_array['CARDNAME_INVALID'] = true;
        }
        
        // if cardNumber is invalid 
        if($cardNumber == NULL || !preg_match("/^[0-9]{16}$/", $cardNumber, $output_array)) {
            $error_array['CARDNUMBER_INVALID'] = true;
        }

        // if cardCVV is invalid 
        if($cardCVV == NULL || !preg_match("/^[0-9]{3}$/", $cardCVV, $output_array)) {
            $error_array['CARDCVV_INVALID'] = true;
        }
        
        // if expirationDate is invalid 

        if($cardExpDate == NULL) {
            $error_array['CARDEXPDATE_INVALID'] = true;
        } else {
	    if($cardExpDate->getTimestamp() <= (time() - 60*60*24) || !preg_match("/^((0[1-9])|(1[0-2]))\/((2009)|(20[1-2][0-9]))$/", $cardExpDate, $output_array)) {
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



