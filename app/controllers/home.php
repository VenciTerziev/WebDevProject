<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Таня
 */
class Home extends Controller
{
   public function index()
   {       
       $this->loadView('home/home');
   }
   
   public function login()
   {
       if (isset($_SESSION['userId'])) {
           header('Location: /WebDevProject/public/home');
       }
       
       
       $this->loadView('home/login');
       if (isset($_POST['username'], $_POST['password'])) {
           $this->loadModel('user', 'login');
       }
   }
   
   public function register()
   {
        if (isset($_SESSION['userId'])) {
           header('Location: /WebDevProject/public/home');
       }
       
       $this->loadView('home/register');
        if (isset($_POST['username'], $_POST['password'], $_POST['confirmPassword'])) {
           $this->loadModel('user', 'register');
       }
   }
   
   public function logged()
   {
       $this->loadView('home/logged');
   }
   
   public function logout()
   {
       $this->loadModel('user', 'logout');
   }
}
