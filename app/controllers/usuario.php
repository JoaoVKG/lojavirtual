<?php

class Usuario extends Controller {

    public function index() {
        $data['erros'] = '';
        $this->view('usuario/login', $data);
    }

    public function cadastro() {
        $data['erros'] = '';
        $this->view('usuario/cadastro', $data);
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
            $data['erros'] = 'Esse email já está cadastrado!';
            $this->view('usuario/cadastro', $data);
        }

    }
    
    public function login() {
        $usuarioModel = $this->model('UsuarioModel');
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = $usuarioModel->getUsuarioByEmailSenha($email, $senha);
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario[0];
            header('Location: /lojavirtual');
        } else {
            $data['erros'] = 'Email ou senha incorretos!';
            $this->view('usuario/login', $data);
        }
    }

    public function sair() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /lojavirtual');
    }

    public function carrinho() {
        $data['titulo'] = 'Carrinho';
        session_start();
        $produtoModel = $this->model('ProdutoModel');
        $data['produtos'] = [];
        $data['qtd_carrinho'] = 0;
       
        if(isset($_SESSION['carrinho'])) {
            $counts = array_count_values($_SESSION['carrinho']);
            foreach ($counts as $key => $value) {
                $data['qtd_carrinho'] += $value;
                $produto = $produtoModel->getProdutoById($key);
                $produto['qtd'] = $value;
                array_push($data['produtos'], $produto);
            }
        }
    

        $this->view('usuario/carrinho', $data);
    }

    public function teste() {
        $this->view('usuario/teste');
    }
    
}