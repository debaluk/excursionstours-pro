<?php

    /*
    *   CUSTOMER what int(2) - LEGENDA
    * 
    *   1 - rentacar
    *   2 - excursion
    *   3 - tour
    */

    require_once($application_folder."/controllers/navigator.php");
    class Booking extends Navigator {

        var $data = array();

        function Booking () 
        {
            parent::__construct(); 
            $this->load->model('tours/booking_m','toursbooking');

             $this->data['language'] = $this->lang_ses->getLang();

            /*Class*/
            $this->load->library('translate');

            //set local language
            $this->translate->setLang($this->lang_ses->getLang());
        }

        function index($page='tours') 
        {
            
            $this->data['page'] = $page; 
            $this->data['title'] = 'SOHO Group - Montenegro | Booking';
  
            $this->core_site('tours/booking',$page,NULL,$this->data);    

        }

        function search()
        {                          
            $this->data['tours'] = $this->toursbooking->serach(); 
            $html = $this->load->view('tours/booking/search',$this->data,TRUE);
            $html .=$this->load->view('tours/booking/list',$this->data,TRUE);
            $this->encode_json_get($html);
        }

        function t_filter()
        {  
            $this->data['tours'] = $this->toursbooking->serach(); 

            $html =$this->load->view('tours/booking/list',$this->data,TRUE);
            $this->encode_json_get($html);

        }

        //  LOADS EXCURSION WIDGET FROM WEB SITE
        function supply()
        {
            $this->data['days'] =  $this->toursbooking->exc_days();  
            $html = $this->load->view('excursions/booking/excursions',$this->data,TRUE); 
            $this->encode_json_get($html);
        }

        function details_booking() 
        {             
            $this->data['tours'] = $this->toursbooking->details(); 
            $html = $this->load->view('tours/booking/details',$this->data,TRUE);                       
            $html = preg_replace(
            array('/\n/','/\r/','/\t/'),
            array(''),
            $html);
            $startdates = $this->toursbooking->readstartdate($_GET['id']);
            echo $_GET['jsoncall'] . '(' . json_encode(array('html'=>$html, 'dates'=>$startdates)) . ');';        
        }      

        function t_check_aviability() 
        {                        
            $this->toursbooking->t_check_aviability(); 

        }

        function book_info($id) 
        {                        
            $this->toursbooking->book_info($id);
        } 

        function book_now()
        {
            $this->load->library('form_validation');
            $this->toursbooking->store_data() ;    
        } 

        function t_total($id)
        {
            $this->toursbooking->get_data($id) ;    
        }

        function encode_json_get($html)
        {
            if(isset($_GET['jsoncall'])) {

                $html = preg_replace(
                array('/\n/','/\r/','/\t/'),
                array(''),
                $html);
                echo $_GET['jsoncall'] . '(' . json_encode(array('html'=>$html)) . ');';

            }else {
                echo json_encode(array('html',$html));
            }
        }
    }

?>
