<?php
/**
 * 
 */
class Auth
{
    
    public static function handleLogin()
    {
        @session_start();
        $logged =false;
        if(isset($_SESSION['loggedIn'])){
            $logged = $_SESSION['loggedIn'];
        }
        if ($logged == false) {
            session_destroy();
            header('location: index');
            exit;
        }
    }
    
}