<?php
namespace Kirolos\GalleryApp\Auth;

use Kirolos\GalleryApp\Db\db; // Import the db class

class Login
{
    use \General;
    private $db;

    public function __construct()
    {
        $this->db = new db; // Create an instance of the db class
    }

    public function login($email_input, $password_input)
    {
        if (empty($email_input) || empty($password_input)) {
            echo "Some inputs are empty";
        } else {
            $email = $this->db->escapeString($email_input);
            $password = $this->db->escapeString($password_input);

            // Create a query to select user data by email
            $query = "SELECT * FROM users WHERE email = '$email'";
            $userData = $this->db->query($query)->fetchArray(); // Fetch user data as an associative array

            if ($this->db->numRows() > 0 && password_verify($password, $userData['mypassword'])) {
                $_SESSION['username'] = $userData['username'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['user_idd'] = $userData['id'];

                $this->redirect_to_index();
                exit(); // Make sure to exit after header redirection
            } else {
                echo "Email or password is wrong";
            }
        }
    }
}
?>
