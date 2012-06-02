<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   

    require_once ($application_folder."/libraries/MY_Controller.php"); 
    class Navigator extends MY_Controller {

        var $data = array();

        function __construct()
        {
            parent::__construct();
            
            $this->data['wp_languages'] = array(
            
            'en' => 'English',
            'me' => 'Crnogorski',
            'de' => 'Deutsch',
            'cz' => 'Český',
            'ru' => 'Rусский ',
            'sl' => 'Slovenski',
            'cn' => '中国的'
            );
            
            $this->data['language'] = $this->lang_ses->getLang();
            
        }

        function index() { show_404(); }         

        function core_site($page=NULL,$sub=NULL,$upsub=NULL, $data=NULL){

            if ($data!=NULL){
                $this->data = array_merge((array)$this->data, (array)$data);   
            }

            $this->data['page'] = $page;
            $this->data['sub'] = $sub;
            $this->data['upsub'] = $upsub;
            $this->data['lang'] = $this->lang_ses->getlang();
            $this->data['path'] = base_url().'assets/';    
            $this->data['url'] = base_url();
            if(!isset($this->data['title']))$this->data['title']='No title';  

            $url;

            if(($sub=='')&&($upsub=='')){ 

                $url = $page;
                $this->asset->flag('page');

            }else if($upsub==''){ 

                    $url = $page.'/'.$sub;
                    $this->asset->flag('sub');

                }else{

                    $url = $page.'/'.$sub.'/'.$upsub;
                    $this->asset->flag('upsub');

            }

            $this->asset->layoutflag('site');

            $this->asset->initialze_assets($page, $sub, $upsub);

            /*
            $this->load->model('sitem');
            $this->data['result'] = $this->sitem->read($page, $sub, $upsub);
            $this->data['language'] = $language = $this->lang->lng_lines();*/

            $this->layout->view($url, $this->data);


        }

    }
?>