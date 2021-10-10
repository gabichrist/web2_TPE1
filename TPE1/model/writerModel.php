<?php

class WriterModel{

    private $db;
    function __construct(){
        $this->db = new PDO ('mysql:host=localhost;' . 'dbname=libreria;charset=utf8', 'root', '');
    }


    function getWriters(){
        $query = $this->db->prepare("SELECT * FROM escritores");
        $query->execute();
        $writers = $query->fetchAll(PDO::FETCH_OBJ);
        return $writers;

    }

    function insertWriter($name, $lastName, $born, $bio){
        $query = $this->db->prepare("INSERT INTO escritores(nombre, apellido, fecha_nacimiento, biografia) VALUES(?, ?, ?, ?)");
        $query->execute(array($name, $lastName, $born, $bio));
    }

    function deleteWriterFromDB($id){
        $query = $this->db->prepare("SELECT * FROM `escritores` WHERE id_escritor=?");
        $query->execute(array($id));

    }

    function updateWriterFromDB($id){ //no se como hacer para que se edite o que se va a editar
        $query = $this->db->prepare("UPDATE escritores SET .... WHERE id_escritor=?");
        $query->execute(array($id));
    }

    function getWriter($id){
        $query = $this->db->prepare("SELECT * FROM escritores WHERE id_escritor=?");
        $query->execute(array($id));
        $writer = $query->fetch(PDO::FETCH_OBJ);
        return $writer;
    }

    // function getBookOfWriter($id){
        
        
    // }
}