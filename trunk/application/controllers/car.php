<?php
require_once($application_folder."/controllers/navigator.php");
class Car extends navigator 
{

    function __construct()
    {
        parent::__construct();

        // load libraries
        $this->load->library('form_validation');

        /*
        * Class Translate
        * set local language
        */
        $this->load->library('translate');
        $this->translate->setLang('me');
        $this->load->model('car_model');
    }

    function index() { show_404(); }

    function view_all_cars(){

        $data['title'] = "Cars";
        $data['all_cars'] = $this->car_model->all_cars(); 
        $this->core_site('cars','view_all_cars',NULL,$data); 

    }

    function view_new_car() {
        $data['title'] = "Add Car";  
        $this->core_site('cars','add_car',NULL,$data);  
    }

    function edit($id){

        $data['title'] = "Edit Car"; 
        $this->data['car'] = $this->car_model->read($id);
        $this->core_site('cars','edit_car',NULL,$data); 

    }

    function create() {
        $this->car_model->create();
    }

    function update(){
        $this->car_model->update();
    }
    
    function delete(){
        $this->car_model->delete($this->input->post('id')); 
    }



}