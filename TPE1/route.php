<?php

require_once "mvc/bookController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);
$bookController = new BookController();

switch ($params[0]) {
    case 'home':
        $bookController->getBooks();
        // showHome();
        break;

    case 'libro':
        if ($params[1] == 'detalle')
            $bookController->getBook($params[2]);
        else
            $bookController->getBooks();
        break;
        // case 'delete':
        //     break;
        // case 'update':
        //     break;
    default:
        echo ('404 Page not found');
        break;
}
