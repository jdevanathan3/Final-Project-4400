<?php
// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController
{
    /**
     * @Route("/registration")
     */
    public function numberAction()
    {

        return new Response(
            'registration'
        );
    }
}

?>