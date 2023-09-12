<?php 
namespace  Kirolos\GalleryApp\Auth;


class Auth {
    use \General;
    private $login;
    private $signup;

    public function __construct() {
            $this->login = new \Kirolos\GalleryApp\Auth\Login();
            $this->signup = new \Kirolos\GalleryApp\Auth\Signup(); 
        }
        

    public function login($email_input, $password_input) {
        // Delegate login operation to the Login class
        return $this->login->login($email_input, $password_input);
    }

    public function signup($submit_button,$email_input, $username_input, $password_input) {
        // Delegate signup operation to the Signup class
        return $this->signup->register($submit_button, $email_input, $username_input, $password_input);
    }
    public function logout() {
        // Perform logout actions here
        session_destroy(); // Destroy the user's session
        // Optionally, you can redirect the user to a logout confirmation page or another page of your choice.
        $this->redirect_to_index();
    }
}
$aut = new Auth;