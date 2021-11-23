<?php
require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class LoginView
{

    public function showLogin($error = "")
    {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('titulo', 'Iniciar Sesión');
        $smarty->assign('error', $error);
        
        $smarty->display('templates/login.tpl');
    }


    //uso el id user en el template 
    public function showUser($user){
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/booksLayoutCSR.tpl');
    }

    public function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }
}
