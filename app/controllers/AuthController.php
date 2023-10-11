<?php
require_once './app/views/AuthView.php';
require_once './app/models/AuthModel.php';
require_once './app/helpers/AuthHelper.php';

class AuthController {
    private $authModel;
    private $authView;
    private $authHelper;

    function __construct() {
        $this->authModel = new UserModel();
        $this->authView = new AuthView();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin() {
        $this->authView->showLogin();
    }

    public function auth() {
        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            $this->authView->showLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->authModel->getByName($name);
        if ($user && password_verify($password, $user->password)) {
            // ACA LO AUTENTIQUE
            
            $this->authHelper->login($user);
            session_regenerate_id(true);
            header('Location: ' . BASE_URL);
        } else {
            $this->authView->showLogin('Usuario inválido');
        }
    }
    function validateUser()
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $user = $this->authModel->getByName($name);
        if ($name && (password_verify($password, $user->password))) {
            session_start();
            $_SESSION['USER_NAME'] = $user->name;
            $_SESSION['USER_ID'] = $user->user_id;
            $_SESSION['IS_LOGGED'] = true;
            header("Location: " . BASE_URL);
        } else {
            $this->authView->showLogin();
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}