<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Таня
 */
class Controller {
    private $model = 'user';
    private $view = 'home';
    
    public function model($model, $method)
    {
        require_once '../app/models/' . $model . '.php';
        $this->model = $model;
        $this->model = new $this->model($method);
    }
    
    public function view ($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}
