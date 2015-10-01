<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of game
 *
 * @author Таня
 */
class game extends Controller{
    
    public function ranking()
    {
        $users = $this->loadModel('game', 'ranking');
        $this->loadView('game/ranking');
        unset($_SESSION['temp']);
    }
    
}
