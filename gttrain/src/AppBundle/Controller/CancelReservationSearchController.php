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


class CancelReservationSearchController extends Controller
{
    /**
     * @Route("/cancelReservationSearch")
     * @Method({"GET"})
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'cancelReservationSearch.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }

    /**
     * @Route("/cancelReservationSearch")
     *
     * @Method({"POST"})
     */
    public function processPost(Request $request) {
        $RIDCancellation = $request->request->get('RIDCancellation');
        return $this->redirectToRoute('cancelReservation',
            ["RIDCancellation" => $RIDCancellation],
            302);
    }
}

?>
