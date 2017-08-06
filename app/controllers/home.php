<?php

class Home extends Controller {

    public function index($name='') {
        $user = $this->model('Usuario');
        $user->name = 'João';
        $data['numero'] = $user->getUsuarioById(1);
        $data['titulo'] = 'Início';

        $this->view('home/index', $data);
    }
    
}