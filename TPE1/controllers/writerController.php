<?php

require_once "models/writerModel.php";
require_once "views/writerView.php";
require_once "helpers/authHelper.php";

class WriterController
{

    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new writerModel();
        $this->view = new writerView();
    }

    function getWriters()
    {
        $writers = $this->model->getWriters();
        $this->view->showWriters($writers);
    }

    function editWriter($id)
    {
        $this->authHelper->checkLoggedIn();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $biografia = $_POST['biografia'];
        $this->model->editWriter($id, $nombre, $apellido, $fecha_nacimiento, $biografia);
        header("Location: " . BASE_URL . "escritores");
    }

    function editWriterForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $writer = $this->model->getWriter($id);
        $this->view->editWriter($writer);
    }

    function deleteWriter($id)
    {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteWriter($id);
        header("Location: " . BASE_URL . "escritores");
    }


    function addWriter()
    {
        $this->authHelper->checkLoggedIn();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $biografia = $_POST['biografia'];
        $this->model->addWriter($nombre, $apellido, $fecha_nacimiento, $biografia);
        header("Location: " . BASE_URL . "escritores");
    }
}
