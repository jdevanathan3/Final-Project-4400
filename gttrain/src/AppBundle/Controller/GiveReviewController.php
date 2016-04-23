<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GiveReviewController extends Controller
{
    /**
     * @Route("/giveReview")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'giveReview.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
