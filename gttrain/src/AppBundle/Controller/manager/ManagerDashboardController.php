<?php

namespace AppBundle\Controller\manager;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class ManagerDashboardController extends Controller
{
    /**
     * @Route("/manager/dashboard")
     */
    public function showDashboard()
    {
        $html = $this->container->get('templating')->render('manager/dashboard.html.twig');
        return new Response($html);
    }
}

?>



