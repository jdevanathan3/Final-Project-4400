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

class GiveReviewController extends Controller
{
    /**
     * @Route("/review/give")
     * @Method({"GET"})
     */
    public function show()
    {
        $html = $this->container->get('templating')->render('review/giveReview.html.twig');
        return new Response($html);
    }
	
    /**
     * @Route("/review/give")
     * @Method({"POST"})
     *
     */
	public function processPost(Request $request) {
		$trainNumber = $request->request->get('trainNumberReview');
		$rating = $request->request->get('rating');
		$comment = $request->request->get('commentReview');

		$error_array = $this->findErrors($trainNumber, $rating, $comment);
		if(count($error_array) > 0) {
		    $html = $this->container->get('templating')->render(
			'review/giveReview.html.twig', $error_array
		    );
		} else {
		    $this->db_insertReview($trainNumber, $comment, $rating);

			return $this->redirectToRoute('userDashboard');
		} 
		return new Response($html);
	}
	
	private function findErrors($trainNumber, $rating, $comment) {
        $error_array = [];

        // if train number is empty
        if($trainNumber == null || !$this->db_checkTrainNumber($trainNumber)) {
            $error_array['TRAINNUMBER_INVALID'] = true;
        }

        return $error_array;
	}
	
	private function db_checkTrainNumber($trainNumber) {
		$db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
		$query = $db->query("SELECT * FROM Train_Route WHERE Train_Number='" . $trainNumber . "'");
		return $query->num_rows != 0;
	}
	
	 private function db_insertReview($trainNumber, $comment, $rating) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");

		$username = $this->get('security.token_storage')->getToken()->getUser();
		$review_id = $db->query("SELECT Max(Review.ReviewID) as MaxID FROM Review");
		$new_id = $review_id->fetch_assoc();
		$new_id = intval($new_id["MaxID"]) + 1;
		$review_date = date("Y-m-d");
		
		
        $db->query("INSERT INTO Review (ReviewID, Username, Train_Number, Comment, Rating, ReviewDate) VALUES ('" . $new_id . "','". $username . "','" . $trainNumber . "', '" . $comment . "', '" . $rating . "', '" . $review_date . "')");
		 
        }
     
}

?>
