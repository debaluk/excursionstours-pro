<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Lang_ses {

    private $CI;
    public $lang;
    private $default = 'me';

    function Lang_ses () {
        $this->CI = & get_instance();
    }

    function setLang($to){
        $this->CI->session->set_userdata('lang',$to);
    }

    function getLang(){
        if($this->CI->session->userdata('lang') != NULL){
            return $this->CI->session->userdata('lang');
        }else{
            return $this->default;
        }
    }
    
}
?>
