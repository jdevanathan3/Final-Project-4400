<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\review;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class ViewReviewSearchController extends Controller
{
    /**
     * @Route("/review/search")
	 * @Method({"GET"})
     */
    public function show()
    {
        $html = $this->container->get('templating')->render('viewReviewSearch.html.twig');
        return new Response($html);
    }
	
	 /**
     * @Route("/review/search", name = "viewReviewSearchD")
     * @Method({"POST"})
     */
	public function processPost(Request $request) {
        $trainNumber = $request->request->get('trainNumberReviewSearch');
		
		$error_array = $this->findErrors($trainNumber);
		if(count($error_array) > 0) {
		    $html = $this->container->get('templating')->render(
			'viewReviewSearch.html.twig', $error_array
		    );
		} else {
		   return $this->redirectToRoute('viewReview', 
            ["trainNumber" => $trainNumber],
            302);
		} 
		return new Response($html);
	}
	
	private function db_isValidTrain($trainNumber) {
		$db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
		$query = $db->query("SELECT * FROM Train_Route WHERE Train_Number='" . $trainNumber . "'");
		return $query->num_rows != 0;
	}
	
	private function findErrors($trainNumber) {
        $error_array = [];

        // if train number is empty or not valid
        if($trainNumber == null || !$this->db_isValidTrain($trainNumber)) {
            $error_array['TRAINNUMBER_INVALID'] = true;
        }

        return $error_array;
	}
	
}




	
?>
