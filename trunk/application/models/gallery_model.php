<?php

    class Gallery_model extends CI_Model{

        function __construct(){
            parent::__construct();

            $default_sizes = array (array('w'=>105,'h'=>79),array('w'=>454,'h'=>340));

            /*CREATE DEFAULT THUMBNAILS*/

            foreach($default_sizes as $d_size):

                $imortant_thumb_preview = $this->db->get_where('settings',array('name' => 'thumbnail_size'))->result_array();

                $create_default_thumb = TRUE;

                if(count($imortant_thumb_preview)>0){

                    foreach($imortant_thumb_preview as $thumb_size){
                        $dims = unserialize($thumb_size['user_data']);

                        if($dims['w']==$d_size['w'] && $dims['h']==$d_size['h']){
                            $create_default_thumb = FALSE;
                        }

                    }

                }

                if($create_default_thumb){

                    $this->db->insert('settings', array('name' => 'thumbnail_size', 'user_data' => serialize(array('w' => $d_size['w'], 'h' =>$d_size['h'])), 'description' => 'Default thumbnail for gallery preview <b>'.$d_size['w'].'x'.$d_size['h'].'<b>'));

                }  
                endforeach;

        }

        function deleteDir($dir, $virtual = false)
        {
            $ds = DIRECTORY_SEPARATOR;
            $dir = $virtual ? realpath($dir) : $dir;
            $dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
            if (is_dir($dir) && $handle = opendir($dir))
            {
                while ($file = readdir($handle))
                {
                    if ($file == '.' || $file == '..')
                    {
                        continue;
                    }
                    elseif (is_dir($dir.$ds.$file))
                    {
                        $this->deleteDir($dir.$ds.$file);
                    }
                    else
                    {
                        unlink($dir.$ds.$file);
                    }
                }
                closedir($handle);
                rmdir($dir);
                return true;
            }
            else
            {
                return false;
            }
        }

        function create_gallery(){

            $path = trim($_POST['galleryname']);
            $path = str_replace(" ","_",$path);

            $this->db->insert('gallery', array(
                    'title' => trim($_POST['galleryname']),
                    'path' => "",
                    'pic_count' => 0
                ));

            if($this->db->affected_rows()>0){

                $gallery_id = $this->db->insert_id();
                $path = 'gallery-'.$gallery_id.'-'.$path;
                $this->db->where('ID',$gallery_id);
                $this->db->update('gallery', array('path' => $path));

                if (!mkdir( "./pro-gallery/".$path, 0777)) {
                    die('Failed to create folder...');
                }else{

                    if (!mkdir( "./pro-gallery/".$path.'/thumbnail', 0777)) {
                        die('Failed to create folder...');
                    }else{

                        if (!mkdir( "./pro-gallery/".$path.'/videos', 0777)) {
                            die('Failed to create folder...');
                        }else{

                            if (!mkdir( "./pro-gallery/".$path.'/videos/thumbnail', 0777)) {
                                die('Failed to create folder...');
                            }else{

                                redirect(base_url().'gallery/view_new_gallery');

                            }

                        }
                    }

                }

            }else{
                echo 'Somthing went wrong.<br />Plase try again';
            }

        }

        function create_pictures(){


            /*print_r($_POST);
            exit;*/

            //Get gallery ID
            $gallery_id = explode('<--delimiter!-->',$_POST['galleryselect']);
            $_POST['galleryselect'] = $gallery_id[0];

            //get dimensions
            $dimensions = $this->db->get_where('settings', array('name' => 'thumbnail_size'))->result_array();


            /* -----> THUMBNAIL IMAGE_MAP SETTINGS */
            $path = './';

            //Get Gallert path
            $g_path =  $this->db->get_where('gallery', array('ID' => $_POST['galleryselect']))->row_array();

            //echo $g_path['path'];

            //Set images folder. (optional parameter)
            //Set cache folder. (must parameter)
            //Set jpeg quality
            //set image not found filepath. a must parameter. Output this image in case the image not found. 
            define("FOLDER_IMAGES",$path.'pro-gallery/'.$g_path['path'].'/');            
            define("FOLDER_CACHE",$path.'pro-gallery/'.$g_path['path'].'/thumbnail/');
            define("JPEG_QUALITY","90");            
            define("FILEPATH_IMAGE_NOT_FOUND",$path."assets/img/img_map/blank.jpg");

            $this->load->library('img_map');           

            //set defines data
            $this->img_map->setImagesFolder(FOLDER_IMAGES);
            $this->img_map->setCacheFolder(FOLDER_CACHE);
            $this->img_map->setErrorImagePath(FILEPATH_IMAGE_NOT_FOUND);
            $this->img_map->setJpegQuality(JPEG_QUALITY);

            /* ----->THUMBNAIL IMAGE_MAP SETTINGS */


            //insert pictures
            $cnt = count($_POST['pictures']);
            for($i=0;$i<$cnt;$i++){

                $this->db->insert('pictures',array(
                        'filename' => $_POST['pictures'][$i],
                        'name' => $_POST['pic_titles'][$i],
                        'date_time' => time(),
                        'gallery_ID' => $_POST['galleryselect']                
                    ));

                foreach ($dimensions as $dimension):

                    //echo '<br>'.print_r($dimension).'<br>';

                    $dim = unserialize($dimension['user_data']);

                    //Create Thumbnails
                    $this->img_map->showImage($_POST['pictures'][$i],$dim['w'],$dim['h'],"exacttop");

                    endforeach;

            }

            //count number of pictures in gallery
            $this->db->where('gallery_ID',$_POST['galleryselect']);
            $pic_count = $this->db->count_all_results('pictures');            

            //update gallery table
            $this->db->where('ID',$_POST['galleryselect']);
            $this->db->update('gallery', array(
                    'pic_count' => $pic_count
                ));

            redirect(base_url().'gallery/view_all_galleries');


        }

        function update_gallery(){             

            switch (substr($_POST['pageid'], 0, 1)) {

                case 'e':
                    $table = 'excursions';
                    $excursions_ID = substr($_POST['pageid'], 2, strlen ($_POST['pageid']));
                    $tours_ID = NULL;
                    break;

                case 't':
                    $table = 'tours';
                    $tours_ID = substr($_POST['pageid'], 2, strlen ($_POST['pageid']));
                    $excursions_ID = NULL;
                    break;

                default:
                    $table = NULL;
                    $excursions_ID = NULL;
                    $tours_ID = NULL;

            }

            $this->db->where('ID',$_POST['gallery_ID']);
            $this->db->update('gallery', array(
                    'title' => $_POST['title'],
                    'excursions_id' =>  $excursions_ID,
                    'tours_id' =>  $tours_ID,
                    'table' => $table 
                ));




            //if($this->db->affected_rows()>0){
            redirect(base_url().'gallery/view_all_galleries');
            //}else{
            //die('Something went wrong. Please try again.');
            //}

        }

        function delete_gallery($gallery_ID){

            $this->db->where('ID',$gallery_ID);
            $res = $this->db->get('gallery')->row_array();
            $path = $res['path'];


            $this->db->where('ID',$gallery_ID);
            $this->db->delete('gallery');

            if($this->db->affected_rows()>0){

                if($this->deleteDir("./pro-gallery/".$path)) {
                    return TRUE;
                }else{
                    return FALSE;
                }                
            }else{
                return FALSE;
            }

        }

        function delete_picture($picture_ID,$gallery_ID){

            //get picture filename
            $p_filename =  $this->db->get_where('pictures', array('ID' => $picture_ID))->row_array();
            $pic_arr = explode('.',$p_filename['filename']);                     


            //delete picture
            $this->db->where('ID',$picture_ID);
            $this->db->delete('pictures');


            if($this->db->affected_rows()>0){

                //count number of pictures in gallery
                $this->db->where('gallery_ID',$gallery_ID);
                $pic_count = $this->db->count_all_results('pictures');            

                //update gallery table
                $this->db->where('ID',$gallery_ID);
                $this->db->update('gallery', array(
                        'pic_count' => $pic_count
                    ));

                //delete image and thumbnails
                $g_path =  $this->db->get_where('gallery', array('ID' => $gallery_ID))->row_array();

                unlink('./pro-gallery/'.$g_path['path'].'/'.$p_filename['filename']);

                //get dimensions
                $dim_arr = $this->db->get_where('settings', array('name' => 'thumbnail_size'))->result_array();

                //$dim_arr = array('105x79','221x117','223x148','469x283');

                foreach($dim_arr as $dim):

                    $d = unserialize($dim['user_data']);

                    $thumb_filename = $pic_arr[0].'_'.$d['w'].'x'.$d['h'].'_exacttop.'.$pic_arr[1];

                    //echo $thumb_filename.'<br>';

                    $path = './pro-gallery/'.$g_path['path'].'/thumbnail/'.$thumb_filename;
                    unlink($path);

                    endforeach; 

                return TRUE;           
            }else{
                return FALSE;
            }

        }

        function delete_video($video_ID,$gallery_ID){               

            //get video
            $video =  $this->db->get_where('videos', array('ID' => $video_ID))->row_array();  

            //delete picture
            $this->db->where('ID',$video_ID);
            $this->db->delete('videos');


            if($this->db->affected_rows()>0){

                //count number of pictures in gallery
                $this->db->where('gallery_ID',$gallery_ID);
                $vid_count = $this->db->count_all_results('videos');            

                //update gallery table
                $this->db->where('ID',$gallery_ID);
                $this->db->update('gallery', array(
                        'vid_count' => $vid_count
                    ));

                //delete image and thumbnails
                $g_path =  $this->db->get_where('gallery', array('ID' => $gallery_ID))->row_array();

                unlink('./pro-gallery/'.$g_path['path'].'/videos/'.$video['link'].'.jpg');

                //get dimensions
                $dim_arr = $this->db->get_where('settings', array('name' => 'thumbnail_size'))->result_array();

                foreach($dim_arr as $dim):

                    $d = unserialize($dim['user_data']);

                    $thumb_filename = $video['link'].'_'.$d['w'].'x'.$d['h'].'_exacttop.jpg';

                    $path = './pro-gallery/'.$g_path['path'].'/videos/thumbnail/'.$thumb_filename;
                    unlink($path);

                    endforeach; 

                return TRUE;      

            }else{
                return FALSE;
            }

        }

        function view_all_galleries(){

            $res = $this->db->get('gallery')->result_array();
            return $res;

        }

        function view_edit_gallery($gallery_ID=NULL){

            if($gallery_ID!=NULL)$_GET['gallery_ID'] = $gallery_ID;

            $this->db->where('ID',$_GET['gallery_ID']);
            $res = $this->db->get('gallery')->row_array();
            return $res;

        }

        function view_edit_pictures($gallery_ID=NULL){

            if($gallery_ID!=NULL)$_GET['gallery_ID'] = $gallery_ID;

            $this->db->where('gallery_ID',$_GET['gallery_ID']);

            $this->db->order_by('order asc, ID asc'); 

            $res = $this->db->get('pictures')->result_array();
            return $res;

        }

        function view_edit_videos($gallery_ID=NULL){

            if($gallery_ID!=NULL)$_GET['gallery_ID'] = $gallery_ID;

            $this->db->where('gallery_ID',$_GET['gallery_ID']);

            $this->db->order_by('order asc, ID asc'); 

            $res = $this->db->get('videos')->result_array();
            return $res;

        }

        function create_thumbnails_again(){

            //crop and resize library
            $this->load->library('img_map');

            //get dimensions
            $dimensions = $this->db->get_where('settings', array('name' => 'thumbnail_size'))->result_array();

            //print_r($dimensions);

            $galleries = $this->db->get('gallery')->result_array();

            //No galiers and No pictures
            //No need to create thumbnail
            if(!count($galleries)>0){
                echo 'No galiers and No pictures';
                return TRUE;
            }

            //print_r($galleries);

            //delete thumbnails folders and files within each gallery
            foreach ($galleries as $gallery):

                $this->deleteDir("./pro-gallery/".$gallery['path'].'/thumbnail');

                if (!mkdir( "./pro-gallery/".$gallery['path'].'/thumbnail', 0777)) {
                    die('Failed to create folder...');
                }else{ 


                    /* -----> THUMBNAIL IMAGE_MAP SETTINGS */           

                    //set defines data
                    $this->img_map->setImagesFolder('./pro-gallery/'.$gallery['path'].'/');
                    $this->img_map->setCacheFolder('./pro-gallery/'.$gallery['path'].'/thumbnail/');
                    $this->img_map->setErrorImagePath("./assets/img/img_map/blank.jpg");
                    $this->img_map->setJpegQuality("90");

                    /* ----->THUMBNAIL IMAGE_MAP SETTINGS */  

                    //create pictures

                    if ($handle = opendir('./pro-gallery/'.$gallery['path'].'/')) {

                        /* This is the correct way to loop over the directory. */
                        while (false !== ($entry = readdir($handle))) {
                            if ($entry != "." && $entry != ".." && $entry != "thumbnail"  && $entry != "videos") {

                                foreach ($dimensions as $dimension):

                                    //echo '<br>'.print_r($dimension).'<br>';

                                    $dim = unserialize($dimension['user_data']);

                                    //Create Thumbnails
                                    $this->img_map->showImage($entry,$dim['w'],$dim['h'],"exacttop");

                                    endforeach;

                            }

                        }

                        closedir($handle);
                    }else{
                        echo 'no dir';
                    }

                }   

                endforeach;

            redirect(base_url().'settings/view_all_thimbnail_size?m=true');

        } 

        function picture_order(){

            $pictures = $this->view_edit_pictures($_POST['gallery_ID']);
            $nr = count($pictures);

            for ($k=0; $k<$nr; $k++) {

                $this->db->where('ID',$pictures[$k]['ID']);
                $this->db->update('pictures', array('order'=>$_POST['picture-order'][$k])); 

            }

            redirect(base_url().'gallery/view_all_galleries');

        }  

        function create_videos(){

            /*print_r($_POST);
            exit;*/

            //Get gallery ID
            $gallery_id = explode('<--delimiter!-->',$_POST['galleryselect2']);
            $_POST['galleryselect2'] = $gallery_id[0];


            $this->db->insert('videos',array(
                    'link' => $_POST['yt-link'],
                    'name' => $_POST['yt-name'],
                    'date_time' => time(),
                    'gallery_ID' => $_POST['galleryselect2']                
                ));


            //count number of pictures in gallery
            $this->db->where('gallery_ID',$_POST['galleryselect2']);
            $vid_count = $this->db->count_all_results('videos');            

            //update gallery table
            $this->db->where('ID',$_POST['galleryselect2']);
            $this->db->update('gallery', array(
                    'vid_count' => $vid_count
                ));

            //get gallery path
            $this->db->where('ID',$_POST['galleryselect2']);
            $gallery = $this->db->get('gallery')->row_array();

            //save image from Youtube
            $image_url = "http://img.youtube.com/vi/".$_POST['yt-link']."/0.jpg";
            $ch = curl_init();
            $timeout = 0;
            curl_setopt ($ch, CURLOPT_URL, $image_url);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

            // Getting binary data
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);

            $image = curl_exec($ch);
            curl_close($ch);

            $f = fopen('./pro-gallery/'.$gallery['path'].'/videos/'.$_POST['yt-link'].'.jpg', 'w');
            fwrite($f, $image);
            fclose($f);

            //Create videos thumbnails
            $dimensions = $this->db->get_where('settings', array('name' => 'thumbnail_size'))->result_array();          

            //set defines data
            $this->load->library('img_map'); 
            $this->img_map->setImagesFolder('./pro-gallery/'.$gallery['path'].'/videos/');
            $this->img_map->setCacheFolder('./pro-gallery/'.$gallery['path'].'/videos/thumbnail/');
            $this->img_map->setErrorImagePath("./assets/img/img_map/blank.jpg");
            $this->img_map->setJpegQuality("90");

            foreach ($dimensions as $dimension):

                $dim = unserialize($dimension['user_data']);

                //Create Thumbnails
                $this->img_map->showImage($_POST['yt-link'].'.jpg',$dim['w'],$dim['h'],"exacttop");

                endforeach;



            redirect(base_url().'gallery/view_all_galleries');


        }

        function video_order(){

            $videos = $this->view_edit_videos($_POST['gallery_ID']);
            $nr = count($videos);

            for ($k=0; $k<$nr; $k++) {

                $this->db->where('ID',$videos[$k]['ID']);
                $this->db->update('videos', array('order'=>$_POST['video-order'][$k])); 

            }

            redirect(base_url().'gallery/view_all_galleries');

        }

    }

?>
