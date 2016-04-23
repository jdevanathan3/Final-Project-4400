<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SelectDepartureController extends Controller
{
    /**
     * @Route("/selectDeparture")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'selectDeparture.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>



