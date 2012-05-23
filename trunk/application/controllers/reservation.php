<?php
/*
* status legend
* status = 0 =>  pocetno stanje
* status = 1 =>  validan - placanje uspesno 
* status = 2 =>  otkazan
* status = 3 =>  validan - rezervacija sa sistema
* status = 4 =>  ceka proces placanja  
*/
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
        $this->translate->setLang($this->lang_ses->getLang());
        $this->load->model('reservation_model');
    }

    function index() { show_404(); }

    function view_all_reservations(){

        $data['title'] = "Reservations";
        $this->core_site('reservations','view_all_reservations',NULL,$data); 

    }

    /*
    *uzima niz datuma iz excusrionbooking
    */
    function exc_dates()
    {
        $this->reservation_model->getBookingDates();   
    }      

    /*
    *filtrira podatke za prikaz u tablesorter-u
    */
    function exc_filter()
    {
        //videti za $type
        $datum ="all days";
        if(!isset($_POST['excdate']) )
        {
            $this->data['status0'] = $this->reservation_model->readStatus0();
            //echo json_encode(array('success'=>'nema time stamp'));   
        }
        else
        {
            //$excdate = $_POST['excdate'];
            //echo json_encode(array('success'=>'ima time stamp ' . date("d.M.Y", 1286748000)));    
            $this->data['status0'] = $this->reservation_model->filterStatus0();   
        }    


        echo json_encode($this->load->view('reservations/view_list_exc',$this->data['status0'],TRUE));   
    }

    /*
    *otkazuje buking stattus na 0 za taj booking
    */
    function excstatus()
    {
        $this->reservation_model->update_status_exc();
    }

    /*
    *uzima niz datuma iz tourbooking
    */
    function tr_dates()
    {
        $this->reservation_model->getTrBookingDates();   
    }


    /*
    *filtrira podatke za prikaz u tablesorter-u
    */
    function tr_filter()
    {
        //videti za $type
        $datum ="all days";
        if(!isset($_POST['trdate']) )
        {
            $this->data['status1'] = $this->reservation_model->readStatus1();
            //echo json_encode(array('success'=>'nema time stamp'));   
        }
        else
        {
            //$excdate = $_POST['excdate'];
            //echo json_encode(array('success'=>'ima time stamp ' . date("d.M.Y", 1286748000)));    
            $this->data['status1'] = $this->reservation_model->filterStatus1();   
        }    


        echo json_encode($this->load->view('reservations/view_list_tr',$this->data['status1'],TRUE));   
    }

    /*
    *otkazuje buking stattus na 0 za taj booking
    */
    function trstatus()
    {
        $this->reservation_model->update_status_tr();
    }
    
    /*
    * Mjenja trenutnoi jezik na sistemu
    */
    function change_lang(){
        
        $this->lang_ses->setLang($_POST['lang']);
        echo json_encode(true);
        
    }

}