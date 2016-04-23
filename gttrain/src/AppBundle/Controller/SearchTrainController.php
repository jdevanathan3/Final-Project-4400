<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchTrainController extends Controller
{
    /**
     * @Route("/searchTrain")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'searchTrain.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>



