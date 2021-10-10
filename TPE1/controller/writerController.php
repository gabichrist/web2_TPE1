<?php

require_once "./model/writerModel.php";
require_once "./view/writerView.php";

class WriterController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new writerModel();
        $this->view = new writerView();
    }

    function showAllWriters(){
       $writers = $this->model->getWriters(); //getWriters es una funcion esta en model
       $this->view->showWriters($writers); // showWriters es una funcion que esta en view
    }

    function viewWriter($id){
        $writer = $this->model->getWriter($id);
        $this->view->viewWriter($writer);

    }

    function createWriter(){
        //funcion que comprueba si escritor puede o no ingresarse para que no se repita.

        $this->model->insertWriter($_POST['name'],$_POST['last-name'],$_POST['born'],$_POST['biography']);
        // insertWiter es una funcion que esta en model le pide a db
        $this->view->showAddWriter();
    }

    function deleteWriter($id){
        $this->model->deleteWriterFromDB($id);
        $this->view->showNewWritersAdmin();
    }

    function updateWriter($id){
        $this->model->updateWriterFromDB($id);
        $this->view->showUpdateWriter();
    }

    function showAllWritersAdmin(){
        $writers = $this->model->getWriters();
        $this->view->showWritersAdmin($writers);
    }

}