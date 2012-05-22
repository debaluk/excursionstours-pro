<?php

/**
 * @author Djordje Zeljic
 * Date: Jun 3, 2010 1:31:55 AM
 */
class toursroomtype_m extends CI_Model {

    function toursroomtype_m () {
        parent::__construct();
    }// construct of toursroomtype_m

    function read(){

    }

    function readByTourId($id){
        return $this->db->where('tourId',$id)->get('toursroomtype')->result_array();
    }
    
}
?>