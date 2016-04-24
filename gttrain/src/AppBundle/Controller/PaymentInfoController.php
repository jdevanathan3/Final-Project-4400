<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \DateTime;

class PaymentInfoController extends Controller
{
    /**
     * @Route("/paymentInfo")
     */
    public function numberAction()
    {
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
	$cardName = $request->request->get('cardName');
	$cardNumber = $request->request->get('cardNumber');
	$cardCVV = $request->request->get('cardCVV');
	$cardExpDate = $request->request->get('cardExpDate');
	$error_array = $this -> findErrors($cardName,$cardNumber, $cardCVV, $cardExpDate);
	var_dump($error_array);
	if(count($error_array) == 0) {
            $html = $this->container->get('templating')->render(
                'paymentInfo.html.twig',
                 array('luckyNumberList' => 1)
            );
	} else {
            $html = $this->container->get('templating')->render(
                'paymentInfo.html.twig', $error_array
            );
            //return new Response($html);
        }
        return new Response($html);
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
            $date = new DateTime();
	    $month = intval(strtok($cardExpDate, "/"));
	    $year = intval(strtok("/"));
            $date->setDate($year, $month, 0);
	    if($date->getTimestamp() <= (time() - 60*60*24)) { 
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



