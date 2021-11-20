<?php

require_once "models/commentModel.php";
require_once "views/apiView.php";
require_once "models/bookModel.php";

class commentAPIController
{

    private $model;
    private $view;
    private $authHelper;
    private $modelBook;

    public function __construct()
    {
        // $this->authHelper = new AuthHelper();
        $this->model = new commentModel();
        $this->view = new apiView();
        $this->modelBook = new bookModel();
    }


    public function getCommentsByBook($params = null)
    {
        // $this->authHelper->checkLoggedIn();
        $idBook = $params[":ID"];
        $comments =  $this->model->getCommentsByBook($idBook);
        if ($comments) {
            return $this->view->response($comments, 200);
        } else {
            return $this->view->response("No hay comentarios", 404);
        }
    }

    public function addCommentBook($params = null)
    {
        // $this->authHelper->checkLoggedIn();
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
        // $this->authHelper->checkLoggedIn();
        $idComment = $params[":ID"];
        $comment = $this->model->getComment($idComment);

        if ($comment) {
            $this->model->deleteComment($idComment);
            return $this->view->response("El comentario ha sido eliminado", 200);
        } else {
            return $this->view->response("El comentario no existe", 404);
        }
    }

    public function getBook($params = null)
    {
        $idBook=  $params[":ID"];
        $book = $this->modelBook->getBook($idBook);
        if($book){
            $this->view->response($book, 200);
        }else{
            return $this->view->response("El libro no existe", 404);
        }
    }


    private function getBody()
    {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}
