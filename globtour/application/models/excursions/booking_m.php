<?php
    class Booking_m extends CI_Model
    {       
        private $fields = array('title','guides','description','excursion_text','addition','pickup_location');
        private $data;

        function Booking_m()
        {
            parent::__construct();
        }

        function exc_days()
        {
            $data = array();

            $Q = $this->db->query('SELECT DISTINCT startWeekDay FROM excursions'); 
            if ($Q->num_rows() > 0) {
                foreach ($Q->result_array() as $row){
                    $data[] = $row;
                }
            }    
            $Q->free_result();      
            return $data;   
        }

        function exc_serach()
        {    
            //print_r($_POST); 

            if(isset($_GET['eb_starting']))   $day = $_GET['eb_starting']; 
            if(isset($_GET['eb_freetext']))   $freetext = $_GET['eb_freetext']; 


            $order_by='adultPrice';
            $direction='ASC';
            if(isset($_GET['eb_sort'])){

                $eb_sort = $_GET['eb_sort'];  

                switch($eb_sort){
                    case 'none':
                        $order_by = 'id';
                        $direction='ASC';
                        break;

                    case 'name':
                        $order_by = 'title';
                        $direction='ASC';
                        break;

                    case 'price':
                        $order_by = 'adultPrice';
                        $direction='ASC';
                        break;
                }
            }       
            $where = "status = 1";

            $like = '';

            if($day!='Any') $like.=" AND (excursions.startWeekDay LIKE '%".$day."%')";

            if((isset($freetext)and($freetext!=''))){
                $like.=" AND (excursions.excursion_text LIKE '%".$freetext."%'";
                $like.=" OR ";
                $like.="excursions.title LIKE '%".$freetext."%'"; 
                $like.=" OR ";
                $like.="excursions.description LIKE '%".$freetext."%')"; 
            } 

            //$this->db->where($where);

            //"SELECT * FROM (`excursions`) WHERE `status` = 1 AND `excursion_text` LIKE '%rafting%' OR `title` LIKE '%rafting%' OR `description` LIKE '%rafting%' ORDER BY `id` ASC"
            $where .= $like;

            $this->db->where($where);

            $this->db->order_by($order_by,$direction); 

            //$res = $this->db->get('excursions')->result_array();




            $q = '
            SELECT excursions.*, gallery.path as g_path, pictures.filename as f_name
            FROM excursions
            LEFT JOIN gallery ON excursions.id = gallery.`excursions_id`
            LEFT JOIN pictures ON gallery.ID = pictures.gallery_ID
            AND pictures.ID=
            (
            SELECT pictures.ID
            FROM pictures
            WHERE pictures.gallery_ID = gallery.ID
            ORDER BY pictures.order ASC, pictures.ID ASC
            LIMIT 0, 1  
            )
            WHERE '.$where.'
            ORDER BY '.$order_by.' '.$direction.'
            ';

            $res = $this->db->query($q)->result_array();


            $this->firephp->log($this->db->last_query());


            foreach($res as $key=>$value){
                //echo $value['title']; 

                //Translate class
                foreach($this->fields as $f){
                    $res[$key][$f] = $this->translate->getArray($value[$f], TRUE);
                    if($res[$key][$f]=='')$res[$key][$f]='-Please translate-';
                }


            }


            //$this->firephp->fb($this->db->last_query());

            return $res;
        }   

        function exc_details()
        {            
            $id = $_GET['id']; 
            $res = $this->db->where(array('id' => $id, 'status' => 1))->get('excursions')->result_array();

            //$this->firephp->log($res);

            //Translate class
            foreach($this->fields as $f){
                //echo $res[$f]."<br>";
                $res[0][$f] = $this->translate->getArray($res[0][$f], TRUE);
            }    

            return $res;
        } 

        function exc_check_aviability()
        {   
            $data['excid'] = $_GET['id'];
            $data['noadult'] = $_GET['noadult'];
            $data['noch'] = $_GET['noch'];
            $data['persons'] = $_GET['persons'];
            $data['adultprice'] = $_GET['adultprice'];
            $data['chprice'] = $_GET['chprice'];
            $data['totalprice'] = $_GET['totalprice'];
            $data['date'] = $_GET['date'];
            $data['pickup_location'] = $_GET['pickup_location'];



            $reserved = 0;
            $this->db->select('capacity'); 
            $query = $this->db->get_where('excursions', array('id' => $data['excid']))->result_array(); 
            foreach ($query as $key => $list) {
                $capacity= $list['capacity']; 
            } 

            $this->db->select('noperson'); 
            $query = $this->db->get_where('excursionbooking', array('excursions_id' => $data['excid'], 'date_from' => $data['date'],'status' =>1))->result_array(); 
            foreach ($query as $key => $list) {
                $reserved += $list['noperson']; 
            }
            $aviabile = $capacity -$reserved;

            if($data['persons'] <= $aviabile)
            {

                /*ADD SESSION DATA*/
                $data['session_id'] = $this->session->userdata('session_id');    
                $data['ip_address'] = $this->session->userdata('ip_address');    
                $data['user_agen'] = $this->session->userdata('user_agent');

                if($this->db->insert('book_info', $data)) {
                    $data['book_id'] = $this->db->insert_id();  

                    return array('available'=>1,'book_info'=>$data['book_id']);
                    //$this->encode_json_get($available_arr);                   

                } 
            }
            else
            {
                return array('available'=>0,'place_left'=>$aviabile);
                //$this->encode_json_get($available_arr); 
            }

        }       

        function book_info($id)
        {
            return $this->db->where('id',$id)->get('book_info')->result_array();
        }

        /*
        *upisuje podatke za customera ako je novi 
        *upisuje novi booking 
        */
        function store_data()
        {            

            $response = "ok";
            $customerid = -1;

            if($this->validate() == 1) {
                $this->db->select('id'); 
                $query = $this->db->get_where('customers', array('email' => $_GET['email'],'what'=>2))->result_array(); 

                foreach ($query as $key => $list) {
                    $customerid= $list['id']; 
                } 


                $data = array(
                    'title' => $_GET['a_title1'],
                    'firstName' => $_GET['a_firstName1'],
                    'lastName' => $_GET['a_lastName1'],   
                    'email' => $_GET['email'],
                    'phone' => $_GET['phone'],
                    'what' => 2
                ); 

                $this->db->insert('customers', $data);
                $customerid = $this->db->insert_id();


                if($response == "ok")
                {
                    if($_GET['s_b_i']=='sohotravel.it-montenegro.com'){
                        $status = 1;
                    }else $status = 0;

                    $data = array(
                        'excursions_id' => $_GET['excid'],
                        'customers_id' => $customerid,
                        'userid' => '7',
                        'date_from' => $_GET['date'],
                        'num_of_day' => '1',                          
                        'status' => $status,

                        'noadult' => $_GET['noadult'],
                        'noch' => $_GET['noch'],                         
                        'noperson' => $_GET['persons'],

                        'chprice' => $_GET['chprice'],
                        'adultprice' => $_GET['adultprice'],
                        'totalprice' => $_GET['totalprice'],        

                        'source_info' => $_GET['s_b_i'],
                        'pickup_location' => $_GET['pickup_location']

                    );

                    if($this->db->insert('excursionbooking', $data))
                    {
                        $newid = $this->db->insert_id();

                        /*DELETE FROM BOOKINFO*/
                        //$this->db->delete('book_info', array('session_id' => $this->session->userdata('session_id'))); 

                        $this->encode_json_get(array('success'=>'success','booking_id'=>$newid));
                    } 
                    else
                    {
                        //$response = "false, db error";  
                        $this->encode_json_get(array('success'=>'failed','message'=>"database error"));    
                    }
                }
            }
            else
            {
                $this->encode_json_get(array('success'=>'failed','message'=>$this->errors));
            }
        }

        /*
        *              VALIDATE EXCURSION
        */

        function validate() {
            return TRUE;
            $this->form_validation->set_rules('a_firstName1','Traveler 1 (Adult) First name','trim|required');
            $this->form_validation->set_rules('a_lastName1','Traveler 1 (Adult) Last name','trim|required');

            $this->form_validation->set_rules('email','Contact Details | Email address','trim|required|valid_email');
            $this->form_validation->set_rules('email1','Contact Details | Verify email address','trim|required|valid_email');
            if($this->form_validation->run()) {
                return TRUE;
            }else {
                $this->errors = validation_errors(' ', '<br />');
                return FALSE;
            }
        }

        /*
        *vraca podatke za upisani booking
        */
        function get_data($newid)
        {
            //print_r($newid);
            $this->data['eb_newid'] = $newid;  

            //podaci o bookingu
            $query = $this->db->get_where('excursionbooking', array('id' => $this->data['eb_newid']))->result_array(); 
            foreach ($query as $key => $list) {
                $this->data['eb_excid']= $list['excursions_id']; 
                $this->data['eb_customerid'] = $list['customers_id'];
                $this->data['eb_date_from']= $list['date_from'];
                $this->data['eb_num_of_day'] = $list['num_of_day'];
                $this->data['eb_adultprice'] = $list['adultprice'];
                $this->data['eb_chprice'] = $list['chprice'];
                $this->data['eb_totalprice'] = $list['totalprice'];
                $this->data['eb_status'] = $list['status'];
                $this->data['eb_noadult'] = $list['noadult'];
                $this->data['eb_noch'] = $list['noch'];
                $this->data['eb_noperson'] = $list['noperson'];
                $this->data['eb_userid'] = $list['userid'];
            }
            //Calculate SubToal
            $this->data['eb_adultprice_sub'] = $this->data['eb_noadult'] * $this->data['eb_adultprice']; 
            $this->data['eb_chprice_sub'] = $this->data['eb_noch'] * $this->data['eb_chprice']; 
            //podaci o customeru
            $query = $this->db->get_where('customers', array('id' =>  $this->data['eb_customerid']))->result_array(); 
            foreach ($query as $key => $list) {
                $this->data['cust_firstName'] = $list['firstName'];
                $this->data['cust_lastName']= $list['lastName'];
                $this->data['cust_email'] = $list['email'];
                $this->data['cust_phone'] = $list['phone'];
            } 
            //podaci o eskurziji
            $query = $this->db->get_where('excursions', array('id' =>  $this->data['eb_excid']))->result_array(); 
            foreach ($query as $key => $list) {

                //Translate class
                $this->data['exc_title'] = $this->translate->getArray($list['title'], TRUE);

                $this->data['exc_startWeekDay']= $list['startWeekDay'];
                $this->data['exc_excursion_text'] = $list['excursion_text'];

                //Translate class
                $this->data['exc_addition'] = $this->translate->getArray($list['addition'], TRUE);

                $this->data['exc_adultPrice'] = $list['adultPrice'];
                $this->data['exc_childPrice'] = $list['childPrice'];
                $this->data['exc_transportsid'] = $list['transportsid'];
            } 
            //podaci o transportu
            $query = $this->db->get_where('transports', array('id' =>  $this->data['exc_transportsid']))->result_array(); 
            foreach ($query as $key => $list) {
                $this->data['tra_title'] = $list['title'];
            }

            $this->data['language'] = $this->lang_ses->getLang();

            return  $this->data;

        }

        function encode_json_get($arr){
            if(isset($_GET['jsoncall'])) {

                $arr = preg_replace(
                    array('/\n/','/\r/','/\t/'),
                    array(''),
                    $arr);
                echo $_GET['jsoncall'] . '(' . json_encode($arr) . ');';

            }else {
                echo json_encode($arr);
            }
        }

        /*MERCHANT DATA FUNCTIONS*/
        function read($booking_id){
            return $this->db->get_where('excursionbooking', array('id' => $booking_id))->row_array();
        }
        function exc_details_get($exc_id){
            return $this->db->where('id',$exc_id)->get('excursions')->row_array();
        }

    }
?>
