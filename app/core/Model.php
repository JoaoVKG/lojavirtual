<?php

class Model {

    public $db;
    
    public function __construct() {
        $this->db = $this->connect_database();
    }

    public function connect_database() {
        $mysqli = new mysqli(
            'localhost',
            'root',
            '',
            'lojavirtual'
        );

        $mysqli->set_charset("utf8");

        if ($mysqli->connect_errno) {
            echo "Falha ao tentar conectar com o MySQL: " . $mysqli->connect_error;
        }
        return $mysqli;
    }

    public function get_data($result) {
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        return $data;
    }

}