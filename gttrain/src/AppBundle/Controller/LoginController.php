<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    /**
     * @Route("/login")
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