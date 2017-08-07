<?php

class UsuarioModel extends Model {
    public $name;

    public function __construct() {
        parent::__construct();
    }

    public function getUsuarioById($id) {
        
        $query = $this->db->prepare("SELECT * FROM usuario WHERE id_usuario=?");
        $query->bind_param('i', $id);
        $query->execute();
        $resultado = $this->get_data($query->get_result());
        $query->close();
        return $resultado;

    }

    public function setUsuario() {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = $this->db->prepare('INSERT INTO usuario VALUES (NULL, ?, ?, ?)');
        $query->bind_param('sss', $nome, $email, $senha);
        $return = $query->execute();
        // print_r(mysqli_stmt_error_list($query));
        $query->close();
        return $return;   
    }

    public function getUsuarioByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $query->bind_param('s', $email);
        $query->execute();
        $resultado = $this->get_data($query->get_result());
        $query->close();
        return $resultado;
    }

    

}