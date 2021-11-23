<?php
require_once "views/loginView.php";
require_once "models/userModel.php";
require_once "helpers/authHelper.php";

class LoginController
{

    private $view;
    private $model;
    private $authHelper;
    public function __construct()
    {
        $this->view = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    function logout()
    {
        $this->authHelper->checkLoggedIn();
        session_destroy();
        $this->view->showLogin("Te deslogueaste!");
    }

    public function showLogin()
    {
        $isLogged = $this->authHelper->isLogged();
        if ($isLogged)
            $this->view->showHome();
        else
            $this->view->showLogin();
    }

    public function getUser(){
        $isLogged = $this->authHelper->isLogged();
        if ($isLogged)
            $user = $this->authHelper->getUser();
            $this->view->showUser($user);
    }

    public function verifyLogin()
    {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);

            if ($user && password_verify($password, $user->clave)) {
                $this->authHelper->login($user);
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
        }
    }
}
