<?php
namespace Kirolos\GalleryApp\Auth;

use Kirolos\GalleryApp\Db\DatabaseInterface;

class SignUp {
    private $db;

    public function __construct() {
        $this->db = new \Kirolos\GalleryApp\Db\db; 
    }

    public function register($submit_button, $email_input, $username_input, $password_input) {
        if (isset($submit_button)) {
            if (empty($email_input) || empty($username_input) || empty($password_input)) {
                echo "Some inputs are empty";
            } else {
                $email = $this->db->escapeString($email_input);
                $username = $this->db->escapeString($username_input);
                $password = password_hash($password_input, PASSWORD_DEFAULT); // Hash the password
    
                // Create the SQL query
                $sql = "INSERT INTO users (email, username, mypassword) VALUES ('$email', '$username', '$password')";
    
                // Execute the query
                if ($this->db->query($sql)) {
                    echo "Registration successful!";
                } else {
                    echo "Registration failed.";
                }
            }
        }
    }
}
?>
