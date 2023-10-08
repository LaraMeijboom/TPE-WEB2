<?php

class AuthView{
    public function showLogin($name = null) {
        require './templates/login.phtml';
    }
}