<?php

class Usuario extends Model {
    public $name;

    public function __construct() {
        parent::__construct();
    }

    public function getUsuarioById($id) {
        
        $query = $this->db->prepare("SELECT * FROM usuario WHERE id_usuario=?");
        $query->bind_param('i', $id);
        $query->execute();
        $resultado = $this->get_data($query->get_result());
        return $resultado;

    }
}