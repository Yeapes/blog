<?php 
/* This Blueprint OR Class Creater For Formate Data */
class Format{
    public function dateFormat($date){
        return date('F j,Y,g:i a', strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text."";
        $text = substr($text, 0,$limit);
        $text = substr($text, 0,strrpos($text,' '));
        $text = $text."...";
        return $text;   
    }

    public function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
}









?>