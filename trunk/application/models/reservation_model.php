<?php

    class Reservation_model extends CI_Model{

        var $user_id; 

        var $queryexc0 = 'SELECT t1.id, t1.date_from, t1.num_of_day, t1.totalprice, t1.noadult, t1.noch,
        t2.title, 
        t3.firstName, t3.lastName, t3.phone, t3.title AS c_title, t3.email AS c_email
        FROM excursionbooking AS t1
        INNER JOIN excursions AS t2 ON t1.excursions_id = t2.id
        INNER JOIN customers AS t3 ON t1.customers_id = t3.id
        where t1.status = 1';

        var $queryexc1 = 'SELECT t1.id, t1.date_from, t1.num_of_day, t1.totalprice, t1.noadult, t1.noch,
        t2.title, 
        t3.firstName, t3.lastName, t3.phone, t3.title AS c_title, t3.email AS c_email
        FROM tourbooking AS t1
        INNER JOIN tours AS t2 ON t1.tours_id = t2.id
        INNER JOIN customers AS t3 ON t1.customers_id = t3.id
        where t1.status = 1';

        function __construct(){
            parent::__construct();
            $this->user_id = 7; //hardcode
        }

        function readStatus0() {
            $res = $this->db->query($this->queryexc0." ORDER BY t1.date_from DESC")->result_array();

            //Translate Class
            foreach($res as $key=>$value){
                //echo $value['title']; 

                $res[$key]['title'] = $this->translate->getArray($value['title'], TRUE);
                if($res[$key]['title']=='')$res[$key]['title']='-Please translate-';
            }

            return $res;

        }  
        function filterStatus0() {
            $excdate = $_POST['excdate']; 
            $queryexc0f = $this->queryexc0 . " and t1.date_from='" . $excdate . "'";

            $res = $this->db->query($queryexc0f)->result_array(); 
            
            //Translate Class
            foreach($res as $key=>$value){
                //echo $value['title']; 

                $res[$key]['title'] = $this->translate->getArray($value['title'], TRUE);
                if($res[$key]['title']=='')$res[$key]['title']='-Please translate-';
            }
            
            return $res;
        }

        function readStatus1() {
            $res = $this->db->query($this->queryexc1." ORDER BY t1.date_from DESC")->result_array();
            
            //Translate Class
            foreach($res as $key=>$value){
                //echo $value['title']; 

                $res[$key]['title'] = $this->translate->getArray($value['title'], TRUE);
                if($res[$key]['title']=='')$res[$key]['title']='-Please translate-';
            }

            return $res;
            
        }  
        function filterStatus1() {
            $trdate = $_POST['trdate']; 
            $queryexc0f = $this->queryexc1 . " and t1.date_from='" . $trdate . "'";

            $res = $this->db->query($queryexc0f)->result_array(); 
            
             //Translate Class
            foreach($res as $key=>$value){
                //echo $value['title']; 

                $res[$key]['title'] = $this->translate->getArray($value['title'], TRUE);
                if($res[$key]['title']=='')$res[$key]['title']='-Please translate-';
            }
            
            return $res;
        }  


        /*
        *update status to number defined in status legend
        */
        function update_status_exc()
        {
            if(isset($_POST['excid']) && isset($_POST['excstatusid']))
            {
                $response="ok";

                $excid=$_POST['excid'];
                $excstatusid = $_POST['excstatusid'];

                //uzimamo datum koji vracama radi osvezavanja tabele
                $this->db->select('date_from'); 
                $query = $this->db->get_where('excursionbooking', array(
                'id' => $excid
                ))->result_array(); 

                foreach ($query as $key => $list) {
                    $date_from = $list['date_from']; 
                }

                //menjamo status za zadani id i status koji je poslat preko post variable
                $data = array(
                'status' => $excstatusid
                );

                $this->db->where('id', $excid);
                $this->db->update('excursionbooking', $data); 

                $response = "promena statusa za " . $excid . " u: " . $excstatusid;
                echo json_encode(array('success'=>'success', 's_date'=>$date_from));   
            }
        }


        /*
        *update status to number defined in status legend
        */
        function update_status_tr()
        {
            if(isset($_POST['trid']) && isset($_POST['trstatusid']))
            {
                $response="ok";

                $trid=$_POST['trid'];
                $trstatusid = $_POST['trstatusid'];

                //uzimamo datum koji vracama radi osvezavanja tabele
                $this->db->select('date_from'); 
                $query = $this->db->get_where('tourbooking', array(
                'id' => $trid
                ))->result_array(); 

                foreach ($query as $key => $list) {
                    $date_from = $list['date_from']; 
                }

                //menjamo status za zadani id i status koji je poslat preko post variable
                $data = array(
                'status' => $trstatusid
                );

                $this->db->where('id', $trid);
                $this->db->update('tourbooking', $data); 

                $response = "promena statusa za " . $trid . " u: " . $trstatusid;
                echo json_encode(array('success'=>'success', 's_date'=>$date_from));   
            }
        }


        /*
        *uzima datume iz tabele excbooking za setovanje kalendara
        */
        function getBookingDates()
        {
            $response= array();
            $this->db->select('date_from');   
            $this->db->distinct();
            $this->db->where('status',1);
            $query = $this->db->get('excursionbooking')->result_array(); 
            foreach ($query as $key => $list) {
                array_push($response, date("n-j-Y" , $list['date_from']));
            } 

            $data = array('dates'=>$response);

            echo json_encode($data);  
        }

        /*
        *uzima datume iz tabele excbooking za setovanje kalendara
        */
        function getTrBookingDates()
        {
            $response= array();
            $this->db->select('date_from');   
            $this->db->distinct();
            $this->db->where('status',1);
            $query = $this->db->get('tourbooking')->result_array(); 
            foreach ($query as $key => $list) {
                array_push($response, date("n-j-Y" , $list['date_from']));
            } 

            $data = array('dates'=>$response);

            echo json_encode($data);  
        }

    }

?>
