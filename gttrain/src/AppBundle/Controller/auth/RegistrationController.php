<?php
// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller\auth;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

class RegistrationController extends Controller
{
    /**
     * @Route("/register")
     * @Method({"GET"})
     */
    public function show()
    {
        $html = $this->container->get('templating')->render('auth/register.html.twig');
        return new Response($html);
    }

    /**
     * @Route("/register")
     * @Method({"POST"})
     */
    public function processPost(Request $request) {
        $username = $request->request->get('input_username');
        $email = $request->request->get('input_email');
        $password = $request->request->get('input_password');
        $password2 = $request->request->get('input_password_2');

        $error_array = $this->findErrors($username, $email, $password, $password2);

        if(count($error_array) == 0) {
            $this->db_insertUser($username, $password, $email);
            $html = $this->container->get('templating')->render('auth/registerSuccess.html.twig');
            return new Response($html);
        } else {
            $error_array['prev_username'] = $username;
            $error_array['prev_email'] = $email;
            $html = $this->container->get('templating')->render(
                'auth/register.html.twig', $error_array
            );
            return new Response($html);
        }
    }

    private function db_isUsernameInDB($username) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM User WHERE USERNAME='" . $username . "'");
        $row = $result->fetch_assoc();
        return $row != NULL;
    }

    private function db_isEmailInDB($email) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM User WHERE EMAIL='" . $email . "'");
        $row = $result->fetch_assoc();
        return $row != NULL;
    }

    private function db_insertUser($username, $password, $email) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $db->query("INSERT INTO User (Username, Password, Email) VALUES ('" . $username . "','". $password . "','" . $email . "')");
    }

    private function findErrors($username, $email, $password, $password2) {
        $error_array = [];

        // if username is empty
        if($username == null) {
            $error_array['USERNAME_EMPTY'] = true;
        }

        // if username is already taken
        if($this->db_isUsernameInDB($username)) {
            $error_array['USERNAME_TAKEN'] = true;
        }

        // if email is not valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error_array['EMAIL_INVALID'] = true;
        }

        // if email is already taken
        if($this->db_isEmailInDB($email)) {
            $error_array['EMAIL_TAKEN'] = true;
        }

        // if password is empty
        if($password == NULL) {
            $error_array['PASSWORD_EMPTY'] = true;
        }

        // if password2 is empty
        if($password2 == NULL) {
            $error_array['PASSWORD_2_EMPTY'] = true;
        }

        // if passwords don't match
        if($password != NULL && $password2 != NULL && $password != $password2) {
            $error_array['PASSWORD_MATCH'] = true;
        }


        return $error_array;
    }
}

?>