<?php

    /**
    * @author Ivan Kukic
    * Date: Jun 2, 2010 11:29:07 AM
    */
    require_once($application_folder."/controllers/navigator.php");
    class tours extends Navigator {

        function tours () {

            parent::Navigator();

            $this->title("Ture");

            // load models
            $this->load->model('tours/tours_m','toursm');
            $this->load->model('tours/toursroomtype_m','roomtypem');
            $this->load->model('users_m','usersm'); 

            // load libraries
            $this->load->library('form_validation');

            $this->data['p'] = 'tura';
            $this->data['language'] = $this->lang_ses->getLang();
            
            $this->usersm->check_log(1);

        }// construct of tours

        function add(){
            $this->title("Dodaj Turu");

            $this->carabiner->css('datepicker.css');
            $this->carabiner->css('pepper-grinder/jquery-ui-1.8.4.custom.css');
            $this->carabiner->js('tiny_mce/tiny_mce.js');         
            $this->carabiner->js('tours/add.js');
            $this->carabiner->js('jquery-ui-1.8.5.custom.min.js');         

            $this->navigate('tours/add_v');
        }

        function create(){
            $this->toursm->create();
        }

        function views(){

            $this->title("Pregled tura");

            $this->carabiner->js('tablesorter/jquery.tablesorter.js');
            $this->carabiner->js('tours/views.js');
            $this->carabiner->css('tablesorter/style.css');

            $this->data['tours'] = $this->toursm->readAll();

            $this->navigate('tours/views_v');        
        }

        function edit($id){

            $this->title("Uredi turu");         

            $this->carabiner->css('datepicker.css');
            $this->carabiner->css('pepper-grinder/jquery-ui-1.8.4.custom.css');
            $this->carabiner->js('tiny_mce/tiny_mce.js');  
            $this->carabiner->js('tours/edit.js');
            $this->carabiner->js('jquery-ui-1.8.5.custom.min.js');

            $this->data['tour'] = $this->toursm->read($id);
            $this->data['startdate'] = $this->toursm->readstartdate($id);
            $this->navigate('tours/edit_v');
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