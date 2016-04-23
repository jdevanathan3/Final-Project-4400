<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CancelReservationController extends Controller
{
    /**
     * @Route("/cancelReservation")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'cancelReservation.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
