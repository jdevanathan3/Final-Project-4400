<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrainScheduleController extends Controller
{
    /**
     * @Route("/trainSchedule")
     */
    public function show()
    {
        $html = $this->container->get('templating')->render(
            'viewTrainSchedule.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
