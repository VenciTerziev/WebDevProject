<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormViewHelper
 *
 * @author Таня
 */
class FormViewHelper {
    
    private static $_instance = null;
    private $inputs = '';
    private $attributes = array();
    private $name = '';
    
    public static function create()
    {
        if (self::$_instance == null) {
            self::$_instance = new FormViewHelper();
        }
        return self::$_instance;
    }
    
    public function addAttribute($attributeName, $attributeValue) 
    {    
        $this->attributes[$attributeName] = $attributeValue;
        return $this;
    }
    
    public function setDefaultOption($type, $value, $valueContent)
    {
        $this->inputs = "\t<input type=\"$type\" name=\"$this->name\" value=\"$value\" checked>" 
                . $valueContent . "\n" . $this->inputs;
        
        return $this;
    }
    
    public function setRadioButton($content, $valueKey = 'name', $valueContent = 'value') 
    {
        foreach ($content as $model) {
            $this->inputs .= "\t<input type=\"radio\" name=\"$this->name\" value=\"{$model[$valueKey]}\">" 
            . $model[$valueContent] . "\n";
        }
        
        return $this;
    }
    
    public function setCheckbox($content, $valueKey = 'name', $valueContent = 'value') 
    {
        foreach ($content as $model) {
            $this->inputs .= "\t<input type=\"checkbox\" name=\"$this->name\" value=\"{$model[$valueKey]}\">" 
            . $model[$valueContent] . "\n";
        }
        
        return $this;
    }
    
    public function setDropdown($content, $valueKey = 'id', $valueContent = 'value', $keySelected = null, $valueSelected = null) 
    {
        foreach ($content as $model) {
            $this->inputs .= "\t<option";
            if ($keySelected && $valueSelected) {
                if ($model[$keySelected] == $valueSelected) {
                    $this->inputs .= " selected ";
                }
            }
            $this->inputs .= " value=\"{$model[$valueKey]}\">" . $model[$valueContent] . "</option>";
        }
        
        return $this;
    }
    
    public function setTextField($name, $attributes = array())
    {
        $this->inputs .= "<input type=\"text\" name=\"$name\" ";
        
        foreach ($attributes as $k => $v) {
            $this->inputs .= " " . $k . "=\"$v\" ";
        }
        $this->inputs .= "/> ";
        
        return $this;
    }
    
    public function setPasswordField($name , $attributes = array() )
    {
        $this->inputs .= "<input type=\"password\" name=\"$name\" ";
        foreach ($attributes as $k => $v) {
            $this->inputs .= " " . $k . "=\"$v\" ";
        }
        $this->inputs .= "/> ";
        return $this;
    }

    public function setSubmitButton($buttonName = 'Submit')
    {
        $this->inputs .= "<input type=\"submit\" name=\"submit\" value=\"$buttonName\" />";
        return $this;
    }
    
    public function setTextArea($rows, $cols, $content)
    {
        $this->inputs .= "<textarea rows=\"$rows\" cols=\"$cols\">\n";
        $this->inputs .= $content . "\n</textarea>";
        
        return $this;
    }


    public function render() 
    {
        $output = "<form";
        foreach ($this->attributes as $key => $value){
            $output .= " " . $key . "=" . '"' . $value . '"';
        }
        $output .= " > ";
        $output .= $this->inputs;
        $output .= "</form>";
        
        echo $output;
            
        $this->inputs = '';
        $this->attributes = [];
        $this->name = '';
    }
    
    public function renderDropdown() 
    {   
        $output = "<select";
        foreach ($this->attributes as $key => $value){
            $output .= " " . $key . "=" . '"' . $value . '"';
        }
        $output .= ">\n";
        $output .= $this->inputs;
        $output .= "</select>";
        
        echo $output;
            
        $this->inputs = '';
        $this->attributes = [];
        $this->name = '';
    }
    
    public function renderTextOrPassword()
    {
        echo $this->inputs;
            
        $this->inputs = '';
        $this->attributes = array();
        $this->name = '';
    }
}