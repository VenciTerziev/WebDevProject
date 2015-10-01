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
       $this->view('home/home');
   }
   
   public function login()
   {
       $this->view('home/login');
       if (isset($_POST['username'], $_POST['password'])) {
           $this->model('user', 'login');
       }
   }
   
   public function register()
   {
       $this->view('home/register');
        if (isset($_POST['username'], $_POST['password'], $_POST['confirmPassword'])) {
           $this->model('user', 'register');
       }
   }
}
