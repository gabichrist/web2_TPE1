<?php


require_once('libs/Router.php');
require_once('./controllers/commentAPIController.php');

// crea el router
$router = new Router();

// CAMBIAR TABLA DE ROUTEO
$router->addRoute('comments/libros/:ID', 'GET', 'commentAPIController', 'getCommentsByBook');
$router->addRoute('libros/:ID/comments', 'POST', 'commentAPIController', 'addCommentBook');
$router->addRoute('libros/:ID/comments/:ID', 'DELETE', 'commentAPIController', 'deleteComment');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
