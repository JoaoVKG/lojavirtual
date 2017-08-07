<?php

class Usuario extends Controller {

    public function index() {
        $this->view('usuario/login');
    }

    public function cadastro() {
        $this->view('usuario/cadastro');
    }

    public function carrinho() {
        $data['titulo'] = 'Carrinho';
        $this->view('usuario/carrinho', $data);
    }

    public function teste() {
        $this->view('usuario/teste');
    }
    
}