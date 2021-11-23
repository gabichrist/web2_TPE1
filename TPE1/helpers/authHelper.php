<?php
class AuthHelper
{
    public function __construct()
    {
    }

    public function login($user)
    {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['EMAIL'] = $user->mail;
    }

    public function logout()
    {
        if (!isset($_SESSION))
            session_start();
        session_destroy();
    }

    public function checkLoggedIn()
    {
        if (!isset($_SESSION))
            session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . 'admin');
            die();
        }
    }

    public function isLogged()
    {
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['ID_USER'])) return true;
        return false;
    }


    //funcion que retorna el id_usuario
    public function getUser(){
        
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['ID_USER'])) 

            return $_SESSION['ID_USER'];
    }
}
