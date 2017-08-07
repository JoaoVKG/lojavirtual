<?php

class Produto extends Controller {

    public function index($id='') {
        $data['titulo'] = 'Produto';

        $this->view('produto/index', $data);
    }
    
}