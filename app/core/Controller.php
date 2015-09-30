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
    private $view = 'home';
    
    public function view ($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}
