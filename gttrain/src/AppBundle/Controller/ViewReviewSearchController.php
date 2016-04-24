<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewReviewSearchController extends Controller
{
    /**
     * @Route("/viewReviewSearch")
     */
    public function show()
    {
        $html = $this->container->get('templating')->render(
            'viewReviewSearch.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
	
	 /**
     * @Route("/viewReviewSearch")
     * @Method({"POST"})
     *
     */
	public function processPost(Request $request) {
        $trainNumber = $request->request->get('trainNumberReviewSearch');
        
        return $this->redirectToRoute('viewReview', 
            ["trainNumber" => trainNumber],
            302);
	}
}

?>
