<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class WriterView{

    private $smarty;

    function __construct(){
       $this->smarty = new Smarty(); 
    }

    function showWriters($writers){
        $this->smarty->assign('title', 'Lista de Escritores'); //lo que esta en la izq es el tag lo de la derecha es l que va a motrar
        $this->smarty->assign('writers', $writers);

        $this->smarty->display('templates/writerList.tpl');
    }

    function viewWriter($writer){
        $this->smarty->assign('writer', $writer);
        $this->smarty->display('templates/writerDetail.tpl');
    }

    function showNewWriters(){
        header("Location : ".BASE_URL."writers");
      
    }

    function showNewWritersAdmin(){
        header("Location : ".BASE_URL."admin");
    }

    function showWritersAdmin($writersAdmin){
        $this->smarty->assign('writers', $writersAdmin);
        $this->smarty->display('templates/writersAdmin.tpl');
    }

    function showUpdateWriter(){
        $this->smarty->display();
    }

    function showAddWriter(){
        $this->smarty->display('templates/writerAdd.tpl');
    }
}
