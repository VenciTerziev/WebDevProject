<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Таня
 */
class user extends Controller {
    public function profile()
    {
        if (!isset($_SESSION['userId'])) {
           header('Location: /WebDevProject/public/home');
        }
        
        $this->loadModel('user', 'profile');
        $this->loadView('user/profile');
        unset($_POST['temp']);
    }
}
