<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Таня
 */
class userModel {
    const GOLD_DEFAULT = 1500;
    const FOOD_DEFAULT = 1500;
    
    public function __construct($method) {
        $this->$method();
    }
    
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $db = Database::getInstance('app');
        
        $result = $db->prepare("
            SELECT
                id, username, password, gold, food
            FROM
                users
            WHERE username = ?
        ");

        $result->execute([$username]);

        if ($result->rowCount() <= 0) {
            throw new \Exception('Invalid username');
        }

        $userRow = $result->fetch();
        
        if (password_verify($password, $userRow['password'])) {
            $_SESSION['userId'] = $userRow['id'];
            header('Location: /WebDevProject/public/home');
        }

        throw new \Exception('Invalid credentials');
    }
    
    public function register()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirmPassword'];

        if ($password != $confirm) {
            throw new \Exception("Passwords do not match");
        }
        
        $db = Database::getInstance('app');

        if ($this->exists($username)) {
            throw new \Exception("User already registered");
        }

        $result = $db->prepare("
            INSERT INTO users (username, password, gold, food)
            VALUES (?, ?, ?, ?);
        ");

        $result->execute(
            [
                $username,
                password_hash($password, PASSWORD_DEFAULT),
                self::GOLD_DEFAULT,
                self::FOOD_DEFAULT
            ]
        );

        if ($result->rowCount() > 0) {
            $userId = $db->lastId();

            $db->query("
                INSERT INTO user_buildings (user_id, building_id, level_id)
                SELECT $userId, id, 0 FROM buildings
            ");

            $this->login();
        }

        throw new \Exception('Cannot register user');
    }
    
    public function exists($username)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("SELECT id FROM users WHERE username = ?");
        $result->execute([ $username ]);

        return $result->rowCount() > 0;
    }
    
    public function logout()
    {
        unset($_SESSION['userId']);
        header('Location: /WebDevProject/public/home');
    }
}