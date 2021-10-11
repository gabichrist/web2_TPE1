<?php

require_once "controllers/bookController.php";
require_once "controllers/writerController.php";
require_once "controllers/loginController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);
$bookController = new BookController();
$writerController = new WriterController();
$loginController = new LoginController();
switch ($params[0]) {
    case 'home':
        // case 'libros':
        $bookController->getBooks();
        break;
    case 'libros':
        if (isset($params[1]))

            switch ($params[1]) {
                case 'detalle':
                    $bookController->getBook($params[2]);
                    break;
                case 'agregar':
                    $bookController->addBook();
                    break;
                case 'editar':
                    $bookController->editBookForm($params[2]);
                    break;
                case 'edit':
                    $bookController->editBook($params[2]);
                    $bookController->getBook($params[2]);
                    break;
                case 'eliminar':
                    $bookController->deleteBook($params[2]);
                    break;
                default:
                    $bookController->getBooks();
                    break;
            }
        else
            $bookController->getBooks();
        break;

    case 'escritores':
        if (isset($params[1]))
            switch ($params[1]) {
                case 'agregar':
                    $writerController->addWriter();
                    break;
                case 'editar':
                    $writerController->editWriterForm($params[2]);
                    break;
                case 'edit':
                    $writerController->editWriter($params[2]);
                    break;
                case 'eliminar':
                    $writerController->deleteWriter($params[2]);
                    break;
                case 'libros':
                    $bookController->getBooksbyWriter($params[2]);
                    break;
                default:
                    $writerController->getWriters();
                    break;
            }
        else
            $writerController->getWriters();
        break;
    case 'admin':
        $loginController->showLogin();
        break;
    case 'verify':
        $loginController->verifyLogin();
        break;
    case 'logout':
        $loginController->logout();
        break;
    default:
        echo ('404 Page not found');
        break;
}
