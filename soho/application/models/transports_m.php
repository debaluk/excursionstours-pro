<?php

/**
 * @author Djordje Zeljic
 * Date: May 28, 2010 11:59:31 AM
 */
class transports_m extends CI_Model {

    function transports_m () {
        parent::__construct();
    }// construct of transports_m

    function create(){

    }

    function read(){

    }

    function readAll(){ 
        $transports = $this->db->order_by('id','asc')->get('transports')->result_array();
        return $transports;
    }
    
}
?>