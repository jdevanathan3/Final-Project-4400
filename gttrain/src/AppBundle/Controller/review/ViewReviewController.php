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

class ViewReviewController extends Controller
{
    /**
     * @Route("/review/view", name="viewReview")
     * @Method({"GET"})
     */
    public function show(Request $request)
    {
		$inputs = array(
            "trainNumber" => $request->query->get('trainNumber')
        );
		$reviews = $this->db_getReviews($inputs['trainNumber']);
		$html = $this->container->get('templating')->render(
            'viewReview.html.twig',
            array("reviews" => $reviews, "trainNumber" => $inputs['trainNumber'])
        );

		
        return new Response($html);
    }
	
	private function db_getReviews($trainNumber) {
		$db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $reviews = $db->query("SELECT Review.Rating, Review.Comment FROM Review WHERE Train_Number = '" . $trainNumber . "' ");
		
		$allReviews = array();
		for ($x = 0; $x < $reviews->num_rows; $x++)
        {
            $allReviews[$x] = $reviews->fetch_assoc();
        }
		return $allReviews;
	}
	
}

?>
