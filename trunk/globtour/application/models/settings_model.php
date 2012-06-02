<?php

    class Settings_model extends CI_Model{

        function __construct(){
            parent::__construct();
        }

        function create_thumbnail_size(){

            $dimensions = array( 'w' => $_POST['width'], 'h' => $_POST['height'] );

            //print_r(serialize($dimensions));

            $this->db->insert('settings', array (
                    'name' => 'thumbnail_size',
                    'user_data' => serialize($dimensions),
                    'description' => $_POST['description']
                ));

            if($this->db->affected_rows()>0){
                echo json_encode(array('action'=>true,'msg'=>'Successful insert operation.'));
            }else{
                echo json_encode(array('action'=>false,'msg'=>'Something went wrong. Please try again.'));
            }

        }

        function update_thumbnail_size(){

            $dimensions = array( 'w' => $_POST['width'], 'h' => $_POST['height'] );   

            $this->db->where('ID',$_POST['post_ID']);
            $this->db->update('settings', array( 'user_data' => serialize($dimensions), 'description' => $_POST['description']));

            //if($this->db->affected_rows()>0){
                echo json_encode(array('action'=>true,'msg'=>'Successful edit operation.'));
            //}else{
                //echo json_encode(array('action'=>false,'msg'=>'Something went wrong. Please try again.'));
            //}

        }

        function delete_post($post_ID){

            $this->db->where('ID',$post_ID);
            $this->db->delete('settings');

            if($this->db->affected_rows()>0){
                return TRUE;
            }else{
                return FALSE;
            }

        }

        function view_all_thumbnail_size(){

            $res = $this->db->get_where('settings', array('name' => 'thumbnail_size'))->result_array();
            return $res;

        }

        function view_edit_thimbnail_size(){

            $this->db->where('ID',$_GET['post_ID']);
            $res = $this->db->get('settings')->row_array();
            return $res;

        }

    }

?>
