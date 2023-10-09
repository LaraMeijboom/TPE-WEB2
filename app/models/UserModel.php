<?php

class UserModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_app;charset=utf8', 'root', '');
    }

    public function getByName($name) {
        $query = $this->db->prepare('SELECT * FROM usuers WHERE name = ?');
        $query->execute([$name]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
