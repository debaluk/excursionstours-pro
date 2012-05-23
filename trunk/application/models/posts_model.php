<?php

    class Posts_model extends CI_Model{

        var $page_TYPES = array('excursions','tours');
        private $fields = array('title');
        
        function __construct(){
            parent::__construct();
        }

        function view_all_posts(){

            RETURN $this->db->where('user_id',7)->order_by('id','desc')->get('excursions')->result_array();

        }

        function view_post($post_TYPE, $post_ID){

            $res = $this->db->get_where($post_TYPE,array('id' =>$post_ID))->row_array();
            
             //Translate class
            foreach($this->fields as $f){
                //echo $res[$f]."<br>";
                $res[$f] = $this->translate->getArray($res[$f], TRUE);
            }  
            
            RETURN $res;
        }

        function view_related_post($post_TYPE){ // Page, arrangements, cars etc...

            $res = $this->db->get($post_TYPE)->result_array();
            
            foreach($res as $key=>$value){
                //echo $value['title']; 

                //Translate class
                foreach($this->fields as $f){
                    $res[$key][$f] = $this->translate->getArray($value[$f], TRUE);
                    if($res[$key][$f]=='')$res[$key][$f]='-Please translate-';
                }


            }
            
            RETURN $res;

        }
        
        function get_page_types(){
            
            RETURN $this->page_TYPES;
            
        }

    }

?>