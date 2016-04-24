<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConfirmationController extends Controller
{
    /**
     * @Route("/confirmation", name="confirmation")
     */
    public function show()
    {
        $reservationId = $_SESSION['reservationId'];
        $html = $this->container->get('templating')->render(
            'confirmation.html.twig',
            array('reservationId' => $reservationId)
        );
        $variable = $_SESSION['reservationId'];
        unset( $_SESSION['reservationId'], $variable );
        return new Response($html);
    }
}

?>
