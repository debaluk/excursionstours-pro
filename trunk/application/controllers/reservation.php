<?php
require_once($application_folder."/controllers/navigator.php");
class Reservation extends navigator 
{

    function __construct()
    {
        parent::__construct();

        /*Helpers*/
        // load helpers
        $this->load->helper('date');
        $this->load->helper('timemaker');

        /*
        * Class Translate
        * set local language
        */
        $this->load->library('translate');
        $this->translate->setLang('me');
        $this->load->model('reservation_model');
    }

    function index() { show_404(); }

    function view_all_reservations(){

        $data['title'] = "Reservations";
        $data['all_reservations_in_progress'] = $this->reservation_model->all_reservations_in_progress(); 
        $data['all_reservations_on_hold'] = $this->reservation_model->all_reservations_on_hold(); 
        $this->core_site('reservations','view_all_reservations',NULL,$data); 

    }
    
    function view_finish_reservations(){

        $data['title'] = "Completed Bookings";
        $data['all_finish_reservations'] = $this->reservation_model->all_finish_reservations(); 
        $this->core_site('reservations','view_finish_reservations',NULL,$data); 

    }

    function reservation_details($id){

        $data['title'] = "Reservation Details";           
        $this->data['status0'] = $this->reservation_model->readStatus0_details($id);
        $this->data['status0_ac'] = $this->reservation_model->readStatus0_ac_details($id);
        $this->core_site('reservations','reservation_details',NULL,$data);

    }

    function check_modify_date(){
        $this->reservation_model->check_modify_date();
    }
    
    function stop_booking(){
        $this->reservation_model->stop_booking(); 
    }
    
    function end_booking(){
        $this->reservation_model->end_booking(); 
    }

}