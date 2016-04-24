<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class MakeReservationController extends Controller
{
    /**
     * @Route("/makeReservation", name="makeReservation")
     * @Method({"GET"})
     */
    public function showReservation(Request $request)
    {
        $reservationId = $request->request->get('reservationId');
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $html = $this->container->get('templating')->render(
            'makeReservation.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }

    private function getTickets($reservationId) {
        $user = $this->get('security.token_storage')->getToken()->getUser();

    }
}

?>
