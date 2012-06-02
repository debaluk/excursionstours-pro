<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Translate {   

        private $languages = array('me','en','ru','fr','al');
        private $local_lang;

        function  Translate(){

        }

        function get_string_between($string, $start, $end){
            $string = " ".$string;
            $ini = strpos($string,$start);
            if ($ini == 0) return "";
            $ini += strlen($start);
            $len = strpos($string,$end,$ini) - $ini;
            return substr($string,$ini,$len);
        }


        function getArray($post_title,$retrive_result=FALSE){

            $titles = array();

            foreach($this->languages as $l){

                $str = $this->get_string_between($post_title,'<!--:'.$l.'-->','<!--:-->');

                //echo $str."<br>";

                if($str!=""){
                    $titles[$l] = $str;
                }

            }

            if(count($titles)==0)return "No matches";

            if($retrive_result){
                if(isset($titles[$this->getLang()])){
                    return $titles[$this->getLang()];   //String
                } else return "";                       //String

            }else return $titles;                       //Array

        }

        function updatePost($post_title, $title){

            $myArray = $this->getArray($post_title);

            if($myArray=='No matches') $myArray = array();
            $myArray[$this->getLang()] = $title;

            $string = "";
            foreach($this->languages as $l){
                if(isset($myArray[$l])) $string.= '<!--:'.$l.'-->'.$myArray[$l].'<!--:-->';
            }

            return $string;

        }

        function setLang($l){
            $this->local_lang = $l;
        }

        function getLang(){
            return $this->local_lang;
        }
    }         