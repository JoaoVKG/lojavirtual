<?php

class Home extends Controller {

    public function index($id=1) {
        $user = $this->model('UsuarioModel');
        $data['numero'] = $user->getUsuarioById($id);
        $data['titulo'] = 'Início';

        $this->view('home/index', $data);
    }
    
}