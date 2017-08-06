<?php

class Home extends Controller {

    public function index($id='') {
        $user = $this->model('Usuario');
        $data['numero'] = $user->getUsuarioById($id);
        $data['titulo'] = 'Início';

        $this->view('home/index', $data);
    }
    
}