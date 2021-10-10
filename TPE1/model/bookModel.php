<?php

class bookModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=libreria;charset=utf8', 'root', '');
    }

    function getBooks()
    {
        $query = $this->db->prepare("SELECT l.*, e.nombre, e.apellido FROM libros l JOIN escritores e ON l.id_escritor = e.id_escritor");
        $query->execute();
        $books = $query->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    function getBook($id_libro)
    {
        $query = $this->db->prepare("SELECT l.*, e.nombre, e.apellido FROM libros l JOIN escritores e ON l.id_escritor = e.id_escritor WHERE id_libro = ?");
        $query->execute([$id_libro]);
        $book = $query->fetch(PDO::FETCH_OBJ);
        return $book;
    }
}
