<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class UserDashboardController extends Controller
{
    /**
     * @Route("/user/dashboard", name="userDashboard")
     */
    public function showDashboard()
    {
        $html = $this->container->get('templating')->render('mainMenu.html.twig');
        if (isset($_SESSION['reservationId'])) {
            $variable = $_SESSION['reservationId'];
            unset($_SESSION['reservationId'], $variable);
        }
        return new Response($html);
    }
}

?>



