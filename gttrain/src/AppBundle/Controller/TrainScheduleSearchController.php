<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrainScheduleSearchController extends Controller
{
    /**
     * @Route("/trainSchedule/search")
     */
    public function show()
    {
        $html = $this->container->get('templating')->render(
            'viewTrainScheduleSearch.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>
