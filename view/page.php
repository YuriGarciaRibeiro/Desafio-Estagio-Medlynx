<?php
    class page{
        public static function  output($contend = '') {
        require 'header.php';
        
        $header = new header();
        
        $output = $header->output(). $contend;
        

        return $output;


        
        
    
        }
    }