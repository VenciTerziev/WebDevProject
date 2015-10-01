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
    protected $model = 'user';
    protected $view = 'home';
    
    public function loadModel($model, $method)
    {
        require_once '../app/models/' . $model . 'Model.php';
        $this->model = $model . 'Model';
        $this->model = new $this->model($method);
    }
    
    public function loadView ($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}
