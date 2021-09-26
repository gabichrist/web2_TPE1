<?php

require_once "mvc/bookModel.php";
require_once "mvc/bookView.php";

class BookController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new bookModel();
        $this->view = new bookView();
    }

    public function getBooks()
    {
        $books = $this->model->getBooks();
        $this->view->showBooks($books);
    }

    public function getBook($id)
    {
        $book = $this->model->getBook($id);
        $this->view->showBook($book);
    }
}
