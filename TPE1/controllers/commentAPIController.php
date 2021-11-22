<?php

require_once "models/commentModel.php";
require_once "views/apiView.php";
require_once "models/bookModel.php";
require_once "helpers/authHelper.php";

class commentAPIController
{

    private $model;
    private $view;
    private $authHelper;
    private $modelBook;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new commentModel();
        $this->view = new apiView();
        $this->modelBook = new bookModel();
    }


    public function getCommentsByBook($params = null)
    {
        $idBook = $params[":ID"];
        $orderBy = null;
        $order = null;
        // Chequear que exista ese libro, si no existe devolver 404. 
        if (isset($_GET['orderBy'])) {
            $orderBy = $_GET['orderBy'];
        } else {
            $orderBy = 'fecha_creacion';
        }
        if (isset($_GET['order']))
            $order = $_GET['order'];
        else
            $order = 'desc';
        $comments = $this->model->getCommentsByBook($idBook, $orderBy, $order);
        if ($comments) {
            return $this->view->response($comments, 200);
        } else {
            return $this->view->response([], 200);
        }
    }

    public function addCommentBook($params = null)
    {
        $this->authHelper->isLogged();
        $body = $this->getBody();
        $idComment = $this->model->addCommentBook($body->comentario, $body->puntuacion, $body->id_usuario, $body->id_libro);
        if ($idComment) {
            $this->view->response("Se ha insertado correctamente", 400);
        } else {
            $this->view->response("No se ha podido insertar", 500);
        }
    }

    public function deleteComment($params = null)
    {
        $isLogged = $this->authHelper->isLogged();
        if ($isLogged) {
            $isAdmin = $this->authHelper->isAdmin();

            if ($isAdmin) {
                $idComment = $params[":ID"];
                $comment = $this->model->getComment($idComment);

                if ($comment) {
                    $this->model->deleteComment($idComment);
                    return $this->view->response("El comentario ha sido eliminado", 200);
                } else {
                    return $this->view->response("El comentario no existe", 404);
                }
            }
        }
    }

    function getBook($params = null)
    {
        $idBook =  $params[":ID"];
        $book = $this->modelBook->getBook($idBook);
        if ($book) {
            $this->view->response($book, 200);
        } else {
            return $this->view->response("El libro no existe", 404);
        }
    }


    private function getBody()
    {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}
