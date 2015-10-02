<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Token
 *
 * @author Таня
 */
class Token
{
    private static $_instance;
    private function __construct()
    {
    }
    public static function init()
    {
        if (self::$_instance == null) {
            self::$_instance = new Token();
        }
        return self::$_instance;
    }
    public static function render($samePage = false)
    {
        if (!$samePage) {
            self::generateToken();
        }
        $html = '<input type="hidden" name="_token" value="' . $_SESSION['token'] . '">';
        echo $html;
    }
    public static function validates($token)
    {
        $isValid =  $_SESSION['token']  === $token;
        self::generateToken();
        return $isValid;
    }
    public static function getToken($samePageToken = false)
    {
        if (!$samePageToken) {
            self::generateToken();
        }
        return  $_SESSION['token'] ;
    }
    private static function generateToken()
    {
         $_SESSION['token']  = base64_encode(openssl_random_pseudo_bytes(64));
    }
}
