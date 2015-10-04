<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TableViewHelper
{
    private static $_instance = null;
    private $inputs = '';
    private $attributes = array();
    
    public static function create()
    {
        if (self::$_instance == null) {
            self::$_instance = new TableViewHelper();
        }
        return self::$_instance;
    }
    
    public function addRow($cellValues = array())
    {
        $this->inputs .= "<tr>";
        foreach ($cellValues as $cell) {
            $this->inputs .= "<td> $cell </td>";
        }
        
        $this->inputs .= "</tr>";
        return $this;
    }
    
    public function setTableAttributes($attributes = array())
    {
        foreach ($attributes as $k => $v) {
            $this->attributes[$k] = $v;
        }
        return $this;
    }
    
    public function render()
    {
        $output = "<table ";
        foreach ($this->attributes as $k => $v) {
            $output .= "$k=\"$v\" ";
        }
        $output .= "> " . $this->inputs . "</table>";
        
        return $output;
    }
}
