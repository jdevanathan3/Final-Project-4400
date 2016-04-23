<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MakeReservationController extends Controller
{
    /**
     * @Route("/makeReservation")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'makeReservation.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
