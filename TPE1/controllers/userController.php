<?php
require_once "views/loginView.php";
require_once "models/userModel.php";
require_once "helpers/authHelper.php";
require_once "views/registerView.php";
require_once "views/userView.php";

class UserController
{

    private $loginview;
    private $model;
    private $authHelper;
    private $registerview;
    private $userview;


    public function __construct()
    {
        $this->loginview = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
        $this->registerview = new RegisterView();
        $this->userview = new userView();
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
            $user = $this->model->getUserByEmail($email);

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
            $auxUser = $this->model->getUserByEmail($email);
            if (isset($auxUser) && !empty($auxUser)) {
                $this->registerview->showRegister("Ese mail ya fue registrado");
            } else {
                $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
                $this->model->insertUser($nombre, $email, $clave, 'no-admin');
                $user = $this->model->getUserByEmail($email);
                $this->authHelper->login($user);
                $this->registerview->showHome();
            }
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

    function getUsers()
    {
        $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        if ($isAdmin) {
            $users = $this->model->getUsers();
            $this->userview->showUsers($users);
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

    function editUser($id_usuario)
    {
        $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        if ($isAdmin) {
            if (
                isset($_POST['nombre']) && isset($_POST['mail']) && isset($_POST['rol'])
            ) {

                $nombre = $_POST['nombre'];
                $mail = $_POST['mail'];
                $rol = $_POST['rol'];
                $this->model->editUser($nombre, $mail, $rol, $id_usuario);
                header("Location: " . BASE_URL . "usuarios");
            } else {
                $this->userview->showError("Faltan completar los datos requeridos");
            }
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

    function editUserForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        if ($isAdmin) {
            $user = $this->model->getUserById($id);
            $this->userview->editUser($user);
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

    function deleteUser($id_usuario)
    {
        $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        if ($isAdmin) {
            $this->model->deleteUser($id_usuario);
            header("Location: " . BASE_URL . "usuarios");
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }
}
