<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginBindingModel
 *
 * @author Таня
 */
class LoginBindingModel {
    private $username;
    private $password;
    
    public function __construct(array $params) {
        $this->setUsername($params['username']);
        $this->setPassword($params['password']);
    }
    
    /*
     * @param string $username
     */
    private function setUsername($username)
    {
        if (trim($username) == '') {
            throw new Exception("Empty username");
        }
        $this->username = $username;
    }
    
    /*
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /*
     * @param string $paasword
     */
    private function setPassword($password)
    {
        if (trim($password) == '') {
            throw new Exception("Empty password");
        }
        $this->password = $password;
    }
    
    /*
     * @return string
     */
    public function getPassword() 
    {
        return $this->password;
    }
}
