<?php

class AuthHelper {
<<<<<<< HEAD

    function __construct()
    {
=======
    function __construct(){
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
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
<<<<<<< HEAD

=======
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
    public function checkLoggedIn(){
        if (!isset($_SESSION['IS_LOGGED'])) {
        die();
        }
    }
<<<<<<< HEAD
}
=======
}


    
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
