<?php 

trait General
{
    
    public function redirect($url){
        header("Location: $url");
        exit();
    }

    public function redirect_to_index(){
        $this->redirect('http://localhost/Gallery-app/');
    }

    public function getCurrentPageURL(){
        $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === false ? 'http' : 'https';
        return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }

    public function validateInput($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    public function isUserLoggedIn(){
        return isset($_SESSION['user_id']);
    }

    public function getUserID(){
        return $this->isUserLoggedIn() ? $_SESSION['user_id'] : null;
    }

    public function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }

}
