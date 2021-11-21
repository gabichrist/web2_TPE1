<?php

require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class bookView
{

    private $authHelper;
    private $smarty;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $isLogged = $this->authHelper->isLogged();
        $this->smarty = new Smarty();
        $this->smarty->assign('isLogged', $isLogged);
    }


    public function showBooks($books, $writers)
    {
        $isLogged = $this->authHelper->isLogged();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('isLogged', $isLogged);
        $this->smarty->assign('title', 'Lista de Libros');
        $this->smarty->assign('writers', $writers);
        $this->smarty->assign('books', $books);

        $this->smarty->display('templates/bookList.tpl');
    }

    public function showBook($book)
    {
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('title', 'Información Detallada del Libro');
        $this->smarty->assign('book', $book);
        $this->smarty->display('templates/booksLayoutCSR.tpl');
    }

    public function editBook($book)
    {
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('id', $book->id_libro);
        $this->smarty->assign('titulo', $book->titulo);
        $this->smarty->assign('sinopsis', $book->sinopsis);
        $this->smarty->assign('genero', $book->genero);
        $this->smarty->assign('anio', $book->anio);
        $this->smarty->display('templates/editBook.tpl');
    }

    public function showBooksByWriter($books)
    {
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('title', 'Lista de Libros');
        $this->smarty->assign('books', $books);
        $this->smarty->display('templates/booksByWriter.tpl');
    }
}
