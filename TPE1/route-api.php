<?php


require_once 'libs/Router.php';
// require_once 'controller'; 

// crea el router
$router = new Router();

// CAMBIAR TABLA DE ROUTEO
$router->addRoute('libro/:ID', 'GET', 'commentController', 'getCommentsByBook');
$router->addRoute('libro/:ID/', 'POST', 'commentController', 'addCommentBook');
$router->addRoute('libro/:ID/:ID', 'DELETE', 'commentController', 'deleteComment');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
