<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class MY_Form_validation extends CI_Form_validation {

    function __construct()
    {
        parent::__construct(); 

        /*   Config FirePHP::   */
        $CI =& get_instance();
        $CI->load->config('fireignition');         

        if ($CI->config->item('fireignition_enabled'))
        {
            if (floor(phpversion()) < 5)
            {
                log_message('error', 'PHP 5 is required to run fireignition');
            } else {
                $CI->load->library('firephp');
            }
        }
        else 
        {
            $CI->load->library('firephp_fake');
            $CI->firephp =& $CI->firephp_fake;
        }
        
        //$CI->firephp->fb('hello MY_Form_validation');
        
    }    


    function check_dropdown($selected_value_as_string) {    

        $CI =& get_instance();
        $condition_strict = '0';

        /* Very important
        *
        * comparation must! be same variable type
        * 
        * $selected_value_as_string is value selected before POST
        * $condition_strict is value to compare
        * 
        */       


        //$CI->firephp->info('str:'.$selected_value_as_string);

        /*$CI->firephp->info('POST["page_id"] : gettype('.gettype ($_POST['page_id']).')');
        $CI->firephp->info('POST["page_id"] : getvalue('.$_POST['page_id'].')');        

        $CI->firephp->info('POST["page_id"] : gettype('.gettype ($condition_strict).')');
        $CI->firephp->info('POST["page_id"] : getvalue('.$condition_strict.')');*/


        if($selected_value_as_string==$condition_strict){

            return FALSE;

        }

        return TRUE;

    }

}

