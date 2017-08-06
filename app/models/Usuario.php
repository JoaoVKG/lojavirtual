<?php

class Usuario extends Model {
    public $name;

    public function getUsuarioById($id) {

        $db = $this->connect_database();
        $query = $db->prepare("SELECT * FROM usuario WHERE id_usuario=?");
        $query->bind_param('i', $id);
        $query->execute();
        $resultado = $this->get_data($query->get_result());
        return $resultado;

    }
}