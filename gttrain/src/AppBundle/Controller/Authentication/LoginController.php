<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller\Authentication;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginController extends Controller
{
    /**
     * @Route("/login")
     * @Method({"GET"})
     */
    public function show()
    {
        $html = $this->container->get('templating')->render('auth/login.html.twig');
        return new Response($html);
    }

    /**
     * @Route("/login")
     * @Method({"POST"})
     */
    public function processPost(Request $request) {
        $username = $request->request->get('input_username');
        $password = $request->request->get('input_password');

        $error_array = $this->findErrors($username, $password);

        if(count($error_array) == 0) {

            // http://stackoverflow.com/questions/9550079/how-to-programmatically-login-authenticate-a-user
            $token = new UsernamePasswordToken($username, $password, "public", ["ROLE_USER"]);
            $this->get("security.token_storage")->setToken($token);
            $event = new InteractiveLoginEvent($request, $token);
            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);


            $html = $this->container->get('templating')->render('auth/loginSuccess.html.twig');
            return new Response($html);
        } else {
            $error_array['prev_username'] = $username;
            $html = $this->container->get('templating')->render(
                'auth/login.html.twig', $error_array
            );
            return new Response($html);
        }
    }
    

    private function db_getUser($username) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM User WHERE USERNAME='" . $username . "'");
        return $result->fetch_assoc();
    }

    private function findErrors($username, $password) {
        $error_array = [];

        // if username is empty
        if($username == null) {
            $error_array['USERNAME_EMPTY'] = true;
        }
        
        // if password is empty
        if($password == NULL) {
            $error_array['PASSWORD_EMPTY'] = true;
        }
        
        // if login fails (username wrong, password incorrect)
        $user = $this->db_getUser($username);
        
        if($username != null && $password != null && ($user == null || ($user != null && $user['Password'] != $password))) {
            $error_array['LOGIN_FAILED'] = true;
        }

        return $error_array;
    }

}

?>
