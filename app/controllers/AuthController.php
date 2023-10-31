<?php
require_once './app/views/authView.php';
require_once './app/models/userModel.php';
require_once './app/helpers/authHelper.php';

class AuthController {
    private $authView;
    private $authModel;

    function __construct() {
        $this->authModel = new UserModel();
        $this->authView = new AuthView();
        if (strnatcasecmp(phpversion(), '5.4.0') >= 0 && session_status() == PHP_SESSION_NONE) {
            session_start();
    } else {
        if (session_id() == '') {
            session_start();
        }
    }
}

function showLogin(){
 $this->authView->showLogin();
}
function auth()
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
        $this->authView->showLogin('Error, user or password is incorrect');
    }
}
function logout()
{
    session_destroy();
    header("Location: " . BASE_URL);
}}