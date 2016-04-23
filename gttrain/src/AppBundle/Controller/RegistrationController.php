<?php
// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

class RegistrationController extends Controller
{
    /**
     * @Route("/register")
     */
    public function show()
    {
        $html = $this->container->get('templating')->render(
            'register.html.twig',
            array('luckyNumberList' => 1)
        );

        return new Response($html);
    }

    /**
     * @Route("/register/post")
     */
    public function processPost(Request $request) {
        //var_dump($this->db_getUser($request->request->get('input_username')));
        return new Response("username: " . $request->request->get('input_username') . " email: " . $request->request->get('input_username') . "password: " . $request->request->get('input_username'));
    }

    private function db_getUser($username) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM User WHERE USERNAME='" + $username . "'");
        return $result->fetch_asoc();
    }

    private function db_insertUser($username, $password, $email) {
        return null;

    }
}

?>