<?php

class Home extends Controller {

    public function index() {
        $produto = $this->model('ProdutoModel');
        $data['produtos'] = $produto->getProdutos();
        $data['titulo'] = 'Início';
        $data['qtd_carrinho'] = 0;
        session_start();
        if(isset($_SESSION['carrinho'])) {
            $counts = array_count_values($_SESSION['carrinho']);
            $data['teste'] = $counts;
            foreach ($counts as $key => $value) {
                $data['qtd_carrinho'] += $value;
            }
        }

        $this->view('home/index', $data);
    }
    
}