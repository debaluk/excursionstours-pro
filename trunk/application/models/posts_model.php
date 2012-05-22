<?php

    class Posts_model extends CI_Model{

        var $page_TYPES = array('car');
        
        function __construct(){
            parent::__construct();
        }

        function view_all_posts(){

            RETURN $this->db->where('user_id',7)->order_by('id','desc')->get('car')->result_array();

        }

        function view_post($post_ID){

            RETURN $this->db->get_where('car',array('id'=>$post_ID))->row_array();

        }

        function view_related_post($post_TYPE){ // Page, arrangements, cars etc...

            RETURN $this->db->where('user_id',7)->get('car')->result_array();

        }
        
        function get_page_types(){
            
            RETURN $this->page_TYPES;
            
        }

    }

?>