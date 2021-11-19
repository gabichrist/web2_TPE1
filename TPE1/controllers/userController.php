<?php
require_once "views/loginView.php";
require_once "models/userModel.php";
require_once "helpers/authHelper.php";
require_once "views/registerView.php";

class UserController
{

    private $loginview;
    private $model;
    private $authHelper;
    private $registerview;


    public function __construct()
    {
        $this->loginview = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
        $this->registerview = new RegisterView();
    }

    function logout()
    {
        $this->authHelper->checkLoggedIn();
        session_destroy();
        $this->loginview->showLogin("Te deslogueaste!");
    }

    public function showLogin()
    {
        $isLogged = $this->authHelper->isLogged();
        if ($isLogged)
            $this->loginview->showHome();
        else
            $this->loginview->showLogin();
    }

    public function verifyLogin()
    {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);

            if ($user && password_verify($password, $user->clave)) {
                $this->authHelper->login($user);
                $this->loginview->showHome();
            } else {
                $this->loginview->showLogin("Acceso denegado");
            }
        }
    }

    function registerUser()
    {
        if (!empty($_POST['email']) && !empty($_POST['clave']) && !empty($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
            $this->model->insertUser($nombre, $email, $clave, 'no-admin');
            $user = $this->model->getUser($email);
            $this->authHelper->login($user);
            $this->registerview->showHome();
        }
    }

    function showRegister()
    {
        $isLogged = $this->authHelper->isLogged();
        if ($isLogged)
            $this->registerview->showHome();
        else
            $this->registerview->showRegister();
    }
}
