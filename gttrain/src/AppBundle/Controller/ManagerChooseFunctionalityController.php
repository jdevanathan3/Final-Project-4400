<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManagerChooseFunctionalityController extends Controller
{
    /**
     * @Route("/managerChooseFunctionality")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'managerChooseFunctionality.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>



