<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

Class Montenegrin{

    var $js = array();
    var $css = array();
    var $script_dir = 'assets/js/';
    var $style_dir = 'assets/css/';
    var $base_uri = '';

    var $CI;

    function Montenegrin(){
        $this->CI =& get_instance();
        $this->base_uri = $this->CI->config->item('base_url');

    }

    function display(){

        if( !empty($this->css) ) {

            foreach($this->css as $f):
            
               echo '<link type="text/css" rel="stylesheet" href="'.$this->base_uri.$this->style_dir.$f.'">'."\r\n"; 

            endforeach;   
        }
        
        if( !empty($this->js) ) {

            foreach($this->js as $f):

                echo '<script type="text/javascript" src="'.$this->base_uri.$this->script_dir.$f.'"></script>'."\r\n";

            endforeach;   
        }
        

    }

    public function js($file){

         if(is_array($file)){
            foreach($file as $f){

                $this->js[] .= $f;

            }
        }else{
           $this->js[] .= $file; 
        }

        

    }

    public function css($file){

        if(is_array($file)){
            foreach($file as $f){

                $this->css[] .= $f;

            }
        }else{
           $this->css[] .= $file; 
        }

        
    }

}