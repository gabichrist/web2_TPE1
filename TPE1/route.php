<?php
//require_once "./mvc/controller/bookController.php";
require_once "./controller/writerController.php"; 

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'writers'; // acción por defecto si no envían
}

$params = explode('/', $action);
//$bookController = new BookController();
$writerController = new WriterController();

switch ($params[0]) {

    case 'writers':

        $writerController->showAllWriters();
        //$bookController->getBooks();
        // showHome();
        break;

    case 'view':
        $writerController->viewWriter($params[1]);
        $writerController->showAllWriters();
        break;
    
    case 'create':
        $writerController->addWriter();
        break;

    case 'delete':
        $writerController->deleteWriter($params[1]);
        break;

    case 'update':
        $writerController->updateWriter($params[1]);
        break;
    
    case 'admin':
        $writerController->showAllWritersAdmin();
        break;

    //case 'libro':
        //if ($params[1] == 'detalle')
           // $bookController->getBook($params[2]);
        //else
            //$bookController->getBooks();
        //break;
        // case 'delete':
        //     break;
        // case 'update':
        //     break;
    default:
        echo ('404 Page not found');
        break;
}
