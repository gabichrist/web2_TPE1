<?php

class UserModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=libreria;charset=utf8', 'root', '');
    }

    function getUser($mail)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE mail = ?');
        $query->execute([$mail]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
