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
            $this->load->model('excursions/booking_m','excursionsbooking');

            $this->data['server'] = 'http://sohotravel.it-montenegro.com/';
            $this->data['server'] = 'http://localhost/excursionstours-pro/globtour/';

            $this->data['language'] = $this->lang_ses->getLang();

            /*Class*/
            $this->load->library('translate');

            // Log d'un message classique
            //$this->firephp->log('Booking __construct');
            if(isset($_GET['language'])) {
                //$this->firephp->log($_GET['language']);   
                $this->lang_ses->setLang($_GET['language']);

            }

            //set local language
            $this->translate->setLang($this->lang_ses->getLang());
        }

        function index($page='excursions') 
        {             

            $this->data['page'] = $page; 
            $this->data['days'] =  $this->excursionsbooking->exc_days(); 
            $this->data['title'] = 'Online Booking';

            $this->core_site('excursions/booking',$page,NULL,$this->data);      

        }

        function e_search()
        {    
            $this->data['days'] =  $this->excursionsbooking->exc_days();                         
            $this->data['excursions'] = $this->excursionsbooking->exc_serach(); 
            $html = $this->load->view('excursions/booking/exc_serch',$this->data,TRUE);
            $html .=$this->load->view('excursions/booking/exc_list',$this->data,TRUE);
            $this->encode_json_get($html);
        }

        function e_filter()
        {  
            $this->data['days'] =  $this->excursionsbooking->exc_days();                         
            $this->data['excursions'] = $this->excursionsbooking->exc_serach(); 

            $html =$this->load->view('excursions/booking/exc_list',$this->data,TRUE);
            $this->encode_json_get($html);

        }

        //  LOADS EXCURSION WIDGET FROM WEB SITE
        function supply()
        {
            $this->data['days'] =  $this->excursionsbooking->exc_days();  
            $html = $this->load->view('excursions/booking/excursions',$this->data,TRUE); 
            $this->encode_json_get($html);
        }

        function details_booking() 
        {             
            $this->data['excursions'] = $this->excursionsbooking->exc_details(); 
            $html = $this->load->view('excursions/booking/exc_details',$this->data,TRUE);                       
            $this->encode_json_get($html);        
        }      

        function exc_check_aviability() 
        {                        
            $this->excursionsbooking->exc_check_aviability(); 

        }

        function book_info($id) 
        {                        
            $this->excursionsbooking->book_info($id);
        } 

        function book_now()
        {
            $this->load->library('form_validation');
            $this->excursionsbooking->store_data() ;    
        } 

        function exc_total($id)
        {
            $this->excursionsbooking->get_data($id) ;    
        }

        function encode_json_get($html)
        {
            if(isset($_GET['jsoncall'])) {

                echo $_GET['jsoncall'] . '(' . $this->my_json_encode(array('html'=>$html)) . ');';

            }else {
                echo json_encode(array('html',$html));
            }
        }

        function my_json_encode($arr)
        {
            //convmap since 0x80 char codes so it takes all multibyte codes (above ASCII 127). 
            //So such characters are being "hidden" from normal json_encoding
            array_walk_recursive($arr, array($this, 'multibyte_codes'));
            return mb_decode_numericentity(json_encode($arr), array (0x80, 0xffff, 0, 0xffff), 'UTF-8');

        }

        function multibyte_codes(&$item, $key) { 

            if (is_string($item)) $item = mb_encode_numericentity($item, array (0x80, 0xffff, 0, 0xffff), 'UTF-8'); 

        }
    }

?>
