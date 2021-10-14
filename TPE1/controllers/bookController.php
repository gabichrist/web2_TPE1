<?php

require_once "models/bookModel.php";
require_once "views/bookView.php";
require_once "helpers/authHelper.php";
require_once "models/writerModel.php";

class BookController
{
    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new bookModel();
        $this->view = new bookView();
    }

    public function getBooks()
    {
        $books = $this->model->getBooks();
        $writerModel = new WriterModel();
        $this->view->showBooks($books, $writerModel->getWriters());
    }

    public function getBook($id)
    {
        $book = $this->model->getBook($id);
        $this->view->showBook($book);
    }

    public function editBook($id)
    {
        $this->authHelper->checkLoggedIn();
        $titulo = $_POST['titulo'];
        $sinopsis = $_POST['sinopsis'];
        $genero = $_POST['genero'];
        $anio = $_POST['anio'];
        $this->model->editBook($id, $titulo, $sinopsis, $genero, $anio);
    }

    public function editBookForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $book = $this->model->getBook($id);
        $this->view->editBook($book);
    }

    public function deleteBook($id)
    {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteBook($id);
        header("Location: " . BASE_URL);
    }


    function getBooksbyWriter($id_escritor)
    {
        $books = $this->model->getBooksbyWriter($id_escritor);
        $this->view->showBooksByWriter($books);
    }


    public function addBook()
    {
        $this->authHelper->checkLoggedIn();
        $titulo = $_POST['titulo'];
        $sinopsis = $_POST['sinopsis'];
        $genero = $_POST['genero'];
        $anio = $_POST['anio'];
        $id_escritor = $_POST['escritor'];
        $this->model->addBook($titulo, $sinopsis, $genero, $anio, $id_escritor);
        header("Location: " . BASE_URL);
    }
}
