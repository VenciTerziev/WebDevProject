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
class gameModel {
    
    public function __construct($method) {
        $this->$method();
    }
     /**
     * @Authorize error:("You are not logged in!")
     * @throws \Exception
     */
    public function ranking()
    {
        $db = Database::getInstance('app');
        
        $result = $db->prepare("
            SELECT
                username
            FROM
                users
        ");
        $result->execute();
        
        $rows = $result->fetchAll();
        
        $_SESSION['temp'] = $rows;
        return;
    }
}
