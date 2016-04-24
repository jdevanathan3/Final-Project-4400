<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

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



