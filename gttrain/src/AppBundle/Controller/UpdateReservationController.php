<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpdateReservationController extends Controller
{
    /**
     * @Route("/reservation/search")
     */
    public function show()
    {
        $html = $this->container->get('templating')->render(
            'updateReservation_search.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }

    /**
     *@Route("/reservation/select")
     */
    public function goToSelectReservation() {
        $html = $this->container->get('templating')->render(
            'updateReservation_select.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
    
    /**
     * @Route("/reservation/update")
     */
    public function goToUpdateReservation() {
        $html = $this->container->get('templating')->render(
            'updateReservation_update.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
