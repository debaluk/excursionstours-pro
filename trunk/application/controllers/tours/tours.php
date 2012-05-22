<?php
    require_once($application_folder."/controllers/navigator.php");
    class tours extends Navigator {

        function tours () {

            parent::__construct();

            // load models
            $this->load->model('tours/tours_m','toursm');
            $this->load->model('tours/toursroomtype_m','roomtypem');

            // load libraries
            $this->load->library('form_validation');

            $this->data['p'] = 'tura';
            $this->data['language'] = $this->lang_ses->getLang();

            /*Class*/
            $this->load->library('translate');

            //set local language
            $this->translate->setLang($this->lang_ses->getLang());

        }// construct of tours

        function add(){
            
            $this->data['title'] = "Tour :: Add";      
            $this->core_site('tours','add_v',NULL, $this->data);  
        }

        function create(){
            $this->toursm->create();
        }

        function views(){

            $this->data['title'] = "Tours :: View All";
            $this->data['tours'] = $this->toursm->readAll();
            $this->core_site('tours','views_v',NULL, $this->data);       
        }

        function edit($id){

            $this->data['title'] = "Tour :: Edit";
            $this->data['tour'] = $this->toursm->read($id);
            $this->data['startdate'] = $this->toursm->readstartdate($id);
            $this->core_site('tours','edit_v',NULL, $this->data); 
        }

        function update() {
            $this->toursm->update();
        }

        function delete(){
            $this->toursm->delete();
        }

        function set_status($t_id,$status){
            $this->toursm->set_status($t_id,$status);
            $this->views();
        }
    }
?>
