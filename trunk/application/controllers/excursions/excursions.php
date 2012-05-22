<?php

    require_once($application_folder."/controllers/navigator.php");
    class excursions extends Navigator {

        function excursions () {
            parent::__construct();

            /*MODELS*/
            $this->load->model('transports_m','transportsm');
            $this->load->model('excursions/excursions_m','excursionsm');
            // $this->load->model('eshop/products_m','productsm');           
            //$this->load->model('users_m','usersm'); 

            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->data['p'] = 'izlet';
            $this->data['language'] = $this->lang_ses->getLang();

            /*Class*/
            $this->load->library('translate');

            //set local language
            $this->translate->setLang($this->lang_ses->getLang());
        }

        function add() {

            $this->data['title'] = "Excursions:: Add"; 
            $this->core_site('excursions','add_v',NULL, $this->data); ;
        }

        function create() {
            $this->excursionsm->create();
        }

        function views(){

            $this->data['title'] = "Excursions:: View All";
            $this->data['excursions'] = $this->excursionsm->readAll();
            $this->core_site('excursions','views_v',NULL, $this->data);  
        }

        function edit($id){

            $this->data['title'] = "Excursions:: Edit"; 
            $this->data['excursion'] = $this->excursionsm->read($id);
            $this->core_site('excursions','edit_v',NULL, $this->data); ;
        }

        function update() {
            $this->excursionsm->update();
        }

        function delete(){
            $this->excursionsm->delete();
        }

        function set_status($exc_id,$status){
            $this->excursionsm->set_status($exc_id,$status);
            $this->views();
        }

    }
?>