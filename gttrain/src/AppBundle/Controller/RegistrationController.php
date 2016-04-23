<?php
// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationController extends Controller
{
    /**
     * @Route("/registration")
     */
    public function numberAction()
    {
        $html = $this->container->get('templating')->render(
            'login.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }
}

?>