<?php

class Controller {

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data=[], $base_url='http://localhost/lojavirtual') {
        $base_url = "http://" . $_SERVER['SERVER_NAME'] . "/lojavirtual";
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        require_once '../app/views/' . $view . '.php';
    }
}