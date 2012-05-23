<?php
    class Booking_m extends CI_Model
    {       
         private $fields = array('title','description','tour_text','addition','pickup_location');
        private $data;

        function Booking_m()
        {
            parent::__construct(); 
        }

        function serach()
        {
            //print_r($_POST);
            $where = '';
            $order = '';
            if(isset($_GET['eb_freetext']))   $freetext = $_GET['eb_freetext']; 


            $order_by='id';
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
                        $order_by = 'JS1';
                        $direction='DESC';
                        break;
                }
            }       

            if((isset($freetext)and($freetext!=''))){
                $where = "WHERE (status = 1) AND (tours.description LIKE '%".$freetext."%' OR tours.title LIKE '%".$freetext."%')";
            }else{
                $where = "WHERE (status = 1)";
            } 

            $order = $order_by.' '.$direction;  

            $upit = "SELECT 
            tours.*, JS.description AS 'JS1', JS.price AS 'Cena Jednokrevetne',
            DS.description AS 'DS1', DS.price AS 'Cena Dvokrevetne',
            gallery.path as g_path, pictures.filename as f_name
            FROM tours 
            LEFT JOIN (
            SELECT * FROM tours_room_type WHERE description = 'Jednokrevetna'
            ) JS ON tours.id = JS.id_ture
            LEFT JOIN (
            SELECT * FROM tours_room_type WHERE description = 'Dvokrevetna'
            ) DS ON tours.id = DS.id_ture
            LEFT JOIN gallery ON tours.id = gallery.`tours_id`
            LEFT JOIN pictures ON gallery.ID = pictures.gallery_ID
            AND pictures.ID=
            (
            SELECT pictures.ID
            FROM pictures
            WHERE pictures.gallery_ID = gallery.ID
            ORDER BY pictures.order ASC, pictures.ID ASC
            LIMIT 0, 1  
            )
            ".$where.' ORDER BY '.$order;

            $res = $this->db->query($upit)->result_array();

            foreach($res as $key=>$value){
                //echo $value['title']; 

                //Translate class
                foreach($this->fields as $f){
                    $res[$key][$f] = $this->translate->getArray($value[$f], TRUE);
                    if($res[$key][$f]=='')$res[$key][$f]='-Please translate-';
                }


            } 

            return  $res; 

        }   

        function details()
        {            
            $id = $_GET['id']; 

            $upit = "SELECT tours.*, JS.description AS 'JS1', JS.price AS 'Cena Jednokrevetne',
            DS.description AS 'DS1', DS.price AS 'Cena Dvokrevetne' 
            FROM tours LEFT JOIN (SELECT * FROM tours_room_type WHERE description = 'Jednokrevetna') JS ON tours.id = JS.id_ture
            LEFT JOIN (SELECT * FROM tours_room_type WHERE description = 'Dvokrevetna') DS ON tours.id = DS.id_ture WHERE tours.id=".$id;
            $res = $this->db->query($upit)->result_array();
            
            //Translate class
            foreach($this->fields as $f){
                //echo $res[$f]."<br>";
                $res[0][$f] = $this->translate->getArray($res[0][$f], TRUE);
            } 
             
            return  $res; 
        } 

        function readstartdate($id){
            $data = array();
            $query = $this->db->get_where('departure', array('tours_id' => $id))->result_array(); 
            $startdate = "";
            if($query)
                foreach ($query as $key => $list) {
                    $data[] = date('n-j-Y', $list['startdate']);

            }
            return  $data; 
        }

        function t_check_aviability()
        {   
            $data['tid'] = $_GET['id'];
            $data['noadult'] = $_GET['noadult'];
            $data['noch'] = $_GET['noch'];
            $data['persons'] = $_GET['persons'];
            $data['adultprice'] = $_GET['adultprice'];
            $data['chprice'] = $_GET['chprice'];
            $data['totalprice'] = $_GET['totalprice'];
            $data['date'] = $_GET['date'];



            $reserved = 0;
            $this->db->select('capacity'); 
            $query = $this->db->get_where('tours', array('id' => $data['tid']))->result_array(); 
            foreach ($query as $key => $list) {
                $capacity= $list['capacity']; 
            } 

            $this->db->select('noperson'); 
            $query = $this->db->get_where('tourbooking', array('tours_id' => $data['tid'], 'date_from' => $data['date'],'status' =>1))->result_array(); 
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

                    $available_arr = array('available'=>1,'book_info'=>$data['book_id']);
                    $this->encode_json_get($available_arr);                   

                } 
            }
            else
            {
                $available_arr = array('available'=>0,'place_left'=>$aviabile);
                $this->encode_json_get($available_arr); 
            }

        }       

        function book_info($id)
        {
            $res['book_infos'] = $this->db->where('id',$id)->get('book_info')->result_array();
            $this->encode_json_get(array('html'=>$this->load->view('tours/booking/customer',$res,TRUE)));    
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

                if($customerid < 0)
                {
                    $data = array(
                        'title' => $_GET['a_title1'],
                        'firstName' => $_GET['a_firstName1'],
                        'lastName' => $_GET['a_lastName1'],   
                        'email' => $_GET['email'],
                        'what' => 2
                    ); 

                    if($this->db->insert('customers', $data)) {
                        $customerid = $this->db->insert_id();
                    } 
                    else
                    {
                        $response = "false, db error";
                    }     
                }

                if($response == "ok")
                {

                    if($_GET['s_b_i']=='sohotravel.it-montenegro.com'){
                        $status = 1;
                    }else $status = 0;

                    $data = array(
                        'tours_id' => $_GET['tid'],
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

                        'source_info' => $_GET['s_b_i']       

                    );

                    if($this->db->insert('tourbooking', $data))
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
            $this->data['tb_newid'] = $newid;  

            //podaci o bookingu
            $query = $this->db->get_where('tourbooking', array('id' => $this->data['tb_newid']))->result_array(); 
            foreach ($query as $key => $list) {
                $this->data['tb_tid']= $list['tours_id']; 
                $this->data['tb_customerid'] = $list['customers_id'];
                $this->data['tb_date_from']= $list['date_from'];
                $this->data['tb_num_of_day'] = $list['num_of_day'];
                $this->data['tb_adultprice'] = $list['adultprice'];
                $this->data['tb_chprice'] = $list['chprice'];
                $this->data['tb_totalprice'] = $list['totalprice'];
                $this->data['tb_status'] = $list['status'];
                $this->data['tb_noadult'] = $list['noadult'];
                $this->data['tb_noch'] = $list['noch'];
                $this->data['tb_noperson'] = $list['noperson'];
                $this->data['tb_userid'] = $list['userid'];
            } 
            //Calculate SubToal
            $this->data['tb_adultprice_sub'] = $this->data['tb_noadult'] * $this->data['tb_adultprice']; 
            $this->data['tb_chprice_sub'] = $this->data['tb_noch'] * $this->data['tb_chprice']; 

            //podaci o customeru
            $query = $this->db->get_where('customers', array('id' =>  $this->data['tb_customerid']))->result_array(); 
            foreach ($query as $key => $list) {
                $this->data['cust_firstName'] = $list['firstName'];
                $this->data['cust_lastName']= $list['lastName'];
                $this->data['cust_email'] = $list['email'];
                $this->data['cust_phone'] = $list['phone'];
            } 
            //podaci o turi
            $query = $this->db->get_where('tours', array('id' =>  $this->data['tb_tid']))->result_array(); 
            foreach ($query as $key => $list) {
                
                //Translate class
                $this->data['t_title'] = $this->translate->getArray($list['title'], TRUE);;
                
                $this->data['t_nonights']= $list['nonights'];
                $this->data['t_nodays'] = $list['nodays'];
                
                //Translate class
                $this->data['t_pickup_location'] = $this->translate->getArray($list['pickup_location'], TRUE);;
            } 
            $response = $this->load->view('tours/booking/total',  $this->data, TRUE);  
            $this->encode_json_get(array('success'=>'success','html'=>$response,'book_id'=>$newid)); 
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
            return $this->db->get_where('tourbooking', array('id' => $booking_id))->row_array();
        }
        function t_details_get($t_id){
            return $this->db->where('id',$t_id)->get('tours')->row_array();
        }

    }
?>
