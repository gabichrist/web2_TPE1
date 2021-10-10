<?php

require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class bookView
{

    public function showBooks($books)
    {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('title', 'Lista de Libros');
        $smarty->assign('books', $books);

        $smarty->display('templates/bookList.tpl');
    }

    public function showBook($book)
    {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('title', 'Información Detallada del Libro');
        $smarty->assign('book', $book);

        $smarty->display('templates/bookDetail.tpl');
    }
}
