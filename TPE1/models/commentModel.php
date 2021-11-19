<?php

class commentModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=libreria;charset=utf8', 'root', '');
    }

    function getComment($idComment){
        $query = $this->db->prepare("SELECT FROM comentarios WHERE id = ? ");
        $query->execute([$idComment]);
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    function getCommentsByBook($idBook){
        $query = $this->db->prepare("SELECT * FROM comentarios AS a INNER JOIN libros AS b ON a.id_libro = b.id_libro WHERE b.id_libro = ? ");
        $query->execute([$idBook]);
        $comments =$query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function addCommentBook($comentario, $puntuacion, $id_usuario, $id_libro){
        $query = $this->db->prepare("INSERT INTO comentarios(comentario, puntuacion, id_usuario, id_libro) VALUES (?,?,?,?)");
        $query->execute([$comentario, $puntuacion, $id_usuario, $id_libro]);
        return $this->db->lastInsertId();
    }

    function deleteComment($idComment){
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id = ?");
        $query->execute([$idComment]);
    }

}