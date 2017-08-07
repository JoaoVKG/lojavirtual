<?php

class Usuario extends Controller {

    public function index() {
        $this->view('usuario/login');
    }

    public function cadastro() {
        $this->view('usuario/cadastro');
    }

    public function cadastrar() {
        $usuarioModel = $this->model('UsuarioModel');
        $return = $usuarioModel->setUsuario();
        if($return) {
            $usuario = $usuarioModel->getUsuarioByEmail($_POST['email']);
            session_start();
            $_SESSION['usuario'] = $usuario[0];
            header('Location: /lojavirtual');
        } else {
            header('Location: /lojavirtual/cadastro');
        }

    }

    public function login() {
        
    }

    public function sair() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /lojavirtual');
    }

    public function carrinho() {
        $data['titulo'] = 'Carrinho';
        $this->view('usuario/carrinho', $data);
    }

    public function teste() {
        $this->view('usuario/teste');
    }
    
}