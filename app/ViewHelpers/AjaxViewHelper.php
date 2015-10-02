<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxViewHelper
 *
 * @author Таня
 */
class AjaxViewHelper
{
    private static $_instance = null;
    private $output;

    public static function create()
    {
        if (self::$_instance == null) {
            self::$_instance = new AjaxViewHelper();
        }
        return self::$_instance;
    }
    public function initForm($action, $method = 'post', array $data = array(), $samePageToken = false)
    {
        if (strtolower($method) !== 'post' && strtolower($method) !== 'get') {
            $ajax = "$.ajax({method: \"POST\", url: \"$action\",";
            $ajax .= "data: {";
            $ajax .= "_method: \"$method\",";
        } else {
            $method = strtoupper($method);
            $ajax = "$.ajax({method: \"$method\", url: \"$action\",";
            $ajax .= "data: {";
        }
        foreach ($data as $k => $v) {
            $ajax .= "$k: \"$v\",";
        }
        if (strtolower($method) !== 'get') {
            $token = Token::getToken($samePageToken);
            $ajax .= "_token: \"$token\"";
        }
        $ajax .= "}})";
        $this->output = $ajax;
        return $this;
    }
    public function initCallback($body)
    {
        $this->output .= ".done(
            $body
        );";
        return $this;
    }
    public function render()
    {
        echo $this->output;
        $this->output = "";
    }
}