<?php


    /**
    * @author AbordageSol
    * @version 1.0
    * @created 03-Mar-2012 12:27:02 PM
    */
    class Communicator
    {

        var $srvr_url;
        var $_ci;

        function Communicator()
        {
            $this->_ci =& get_instance();
            $this->_ci->load->library('curl');
            $this->srvr_url = 'http://www.informacionisistem.com/infosis-rests-services/';
            $this->srvr_url = 'http://localhost/infosis-rests-services/';
        }


        /**
        * 
        * @param post
        */
        function communicate($methodName, $post=NULL)
        {
            $username = $this->_ci->config->item('rest_username'); 
            $password = $this->_ci->config->item('rest_password');  

            $this->url = $this->srvr_url.'api/rentBooking/'.$methodName.'/format/json';

            // Start session (also wipes existing/previous sessions)
            $this->_ci->curl->create($this->url);

            // Optional, delete this line if your API is open  
            $this->_ci->curl->http_login($username, $password); 

            // More human looking options
            $this->_ci->curl->option('buffersize', 10);

            // Post - If you do not use post, it will just run a GET request
            if(isset($post))
                $this->_ci->curl->post($post);

            // Execute - returns responce
            $res = $this->_ci->curl->execute();

            // Debug data ------------------------------------------------
            // Errors
            // Information
           /* print_r($this->_ci->curl->error_code).'<br />';
            print_r($this->_ci->curl->error_string).'<br />'; 
            print_r($this->_ci->curl->info['url']).'<br />'; */


            //return $res;
            return json_decode($res);
        }

        /*function test_result($srv_res, $m){

        //print_r($srv_res);

        if(isset($srv_res->error)){
        echo '<br />Error:<br />'.$srv_res->error;
        echo '<br />Method:<br />'.$m;
        return FALSE;
        }

        if(isset($srv_res->num_rows)){
        echo '<br />Empty db result. num_rows = 0';
        echo '<br />Method:<br />'.$m;
        return FALSE;
        }

        return TRUE;

        }*/

    }
?>