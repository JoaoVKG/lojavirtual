<?php 

class ProdutoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getProdutos() {
        $query = $this->db->prepare("SELECT * FROM produto");
        $query->execute();
        $resultado = $this->get_data($query->get_result());
        $query->close();
        return $resultado;
    }

    public function getProdutoById($id) {
        $query = $this->db->prepare("SELECT * FROM produto WHERE id_produto=?");
        $query->bind_param('i', $id);
        $query->execute();
        $resultado = $this->get_data($query->get_result());
        $query->close();
        return $resultado;
    }
}