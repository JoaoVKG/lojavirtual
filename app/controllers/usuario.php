<?php

class Usuario extends Controller {

    public function index() {
        $this->view('usuario/login');
    }

    public function cadastro() {
        $this->view('usuario/cadastro');
    }
    
}