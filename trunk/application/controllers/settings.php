<?php
    require_once($application_folder."/controllers/navigator.php");
    class Settings extends navigator 
    {

        function __construct()
        {
            parent::__construct();

            $this->load->model('settings_model');
        }

        function index() { show_404(); }

        function view_edit_thimbnail_size(){

            $data['title'] = "Edit Thumbnail Size";      
            $data['post_action'] = "edit";
            $data['post_type'] = 'edit_thumbnail_size';   
            $data['post'] = $this->settings_model->view_edit_thimbnail_size();
            $this->core_site('settings','view_edit_thumbnail_size',NULL,$data);

        }

        function view_add_thimbnail_size(){

            $data['title'] = "New Thumbanil Size"; 
            $data['post_action'] = "new";
            $data['post_type'] = 'new_thumbnail_size';
            //$data['all_posts'] = $this->settings_model->view_all_thimbnail_size();
            $this->core_site('settings','view_edit_thumbnail_size',NULL,$data); 

        }

        function view_all_thimbnail_size(){

            if(!isset($_GET['post_type']))$_GET['post_type']='page';

            $data['title'] = "Pages";
            $data['post_type'] = $_GET['post_type'];
            $data['all_posts'] = $this->settings_model->view_all_thumbnail_size(); 
            $this->core_site('settings','view_all_thumbnail_size',NULL,$data); 

        }

        function submit_post(){

            switch($_POST['post_type']){

                case 'new_thumbnail_size':     $this->settings_model->create_thumbnail_size();
                    break;

                case 'edit_thumbnail_size':    $this->settings_model->update_thumbnail_size();
                    break;

            }

        }

        function delete($post_ID){

            if($this->settings_model->delete_post($post_ID)){
                redirect(base_url().'settings/view_all_thimbnail_size');
            }else{
                echo 'Error ocured';
                redirect(base_url().'settings/view_all_thimbnail_size');
            }

        }

}