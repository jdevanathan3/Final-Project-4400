<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MakeReservationController extends Controller
{
    /**
     * @Route("/makeReservation")
     * @Method({"GET"})
     */
    public function showReservation(Request $request)
    {
        $inputs = array(
            "trainNumber" => $request->query->get('trainNumber'),
            "departStation" => $request->query->get('departStation'),
            "arriveStation" => $request->query->get('arriveStation'),
            "departTime" => $request->query->get('departTime'),
            "arriveTime" => $request->query->aget('arriveTime'),
            "date" => $request->query->get('date')
        );
        $html = $this->container->get('templating')->render(
            'makeReservation.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
