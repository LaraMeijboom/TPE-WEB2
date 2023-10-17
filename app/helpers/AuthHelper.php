<?php

class AuthHelper {
    function __construct(){
        if (strnatcasecmp(phpversion(), '5.4.0') >= 0) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        } else {
            if (session_id() == '') {
                session_start();
            }
        }
    }
    public function checkLoggedIn(){
        if (!isset($_SESSION['IS_LOGGED'])) {
        die();
        }
    }
}


    
