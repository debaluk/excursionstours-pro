<?php
require_once($application_folder."/controllers/navigator.php");
class Gallery extends navigator 
{
    
    function __construct()
    {
        parent::__construct();
        
        /****************************************************
            *  CHECK FOR LOGIN
            ****************************************************/    
            
            if(!$this->session->userdata('logged_in')){
                redirect(base_url());   
            }
            
        /*
        * Class Translate
        * set local language
        */
        $this->load->library('translate');
        $this->translate->setLang('me');
        $this->load->model('posts_model');
        $this->load->model('gallery_model');
    }

    function index() { show_404(); }

    function view_edit_gallery($gallery_ID=NULL){

        $data['title'] = "Edit gallery";          
        $data['post_action'] = "edit";     
        $data['gallery'] = $this->gallery_model->view_edit_gallery($gallery_ID);
        $data['pictures'] = $this->gallery_model->view_edit_pictures($gallery_ID);
        $data['videos'] = $this->gallery_model->view_edit_videos($gallery_ID);
        //$data['all_posts'] = $this->posts_model->view_all_posts();
        $data['page_types'] = $this->posts_model->get_page_types();
        $this->core_site('gallery','edit_gallery',NULL,$data);

    }

    function view_new_gallery(){

        $data['title'] = "New gallery / images";
        $data['post_action'] = "new";
        $data['all_galleries'] = $this->gallery_model->view_all_galleries();
        $this->core_site('gallery','add_gallery_images',NULL,$data); 

    }

    function view_all_galleries(){

        $data['title'] = "Galleries";
        $data['all_galleries'] = $this->gallery_model->view_all_galleries(); 
        $this->core_site('gallery','view_all_galleries',NULL,$data); 

    }

    function submit_gallery(){

        switch($_POST['post_action']){

            case 'new-gallery':     $this->gallery_model->create_gallery();
                break;

            case 'edit-gallery':    $this->gallery_model->update_gallery();
                break;
                
            case 'new-pictures':    $this->gallery_model->create_pictures();
                break;
                
            case 'new-videos':    $this->gallery_model->create_videos();
                break;

        }

    }

    function delete($gallery_ID){

        if($this->gallery_model->delete_gallery($gallery_ID)){
            redirect(base_url().'gallery/view_all_galleries');
        }else{
            echo 'Error ocured';
            redirect(base_url().'gallery/view_all_galleries');
        }

    }
    
    function delete_picture($picture_ID,$gallery_ID){

        if($this->gallery_model->delete_picture($picture_ID,$gallery_ID)){
            redirect(base_url().'gallery/view_edit_gallery/'.$gallery_ID);
        }else{
            echo 'Error ocured';
            redirect(base_url().'gallery/view_edit_gallery/'.$gallery_ID);
        }

    }
    
    function delete_video($video_ID,$gallery_ID){

        if($this->gallery_model->delete_video($video_ID,$gallery_ID)){
            redirect(base_url().'gallery/view_edit_gallery/'.$gallery_ID);
        }else{
            echo 'Error ocured';
            redirect(base_url().'gallery/view_edit_gallery/'.$gallery_ID);
        }

    }
    
    function create_thumbnails_again(){
        
        $this->gallery_model->create_thumbnails_again();
        
    }
    
    function picture_order(){
        
        $this->gallery_model->picture_order();
        
    } 
    
    function video_order(){
        
        $this->gallery_model->video_order();
        
    }            


}