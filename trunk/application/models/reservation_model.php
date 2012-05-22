<?php

    class Reservation_model extends CI_Model{

        function __construct(){
            parent::__construct();
        }

        var $reservations_in_progress = '
        SELECT t1.id, t2.name, t1.datefrom, t1.dateto,
        t3.firstName, t3.lastName, t1.source_info, 
        t1.numofdays, t1.dayprice, t1.totalprice ,
        t1.pickup_loc, t1.return_loc
        FROM carbooking AS t1 
        INNER JOIN car AS t2 ON t1.carid= t2.id 
        INNER JOIN customers AS t3 ON t1.customerid = t3.id
        where (t1.status = 1 or t1.status = 3)
        ';

        var $reservations_on_hold = '
        SELECT t1.id, t2.name, t1.datefrom, t1.dateto,
        t3.firstName, t3.lastName, t1.source_info,
        t1.numofdays, t1.dayprice, t1.totalprice,
        t1.pickup_loc, t1.return_loc
        FROM carbooking AS t1
        INNER JOIN car AS t2 ON t1.carid= t2.id
        INNER JOIN customers AS t3 ON t1.customerid = t3.id
        where t1.status = 0
        ';
        
        var $finish_reservations = '
        SELECT t1.id, t2.name, t1.datefrom, t1.dateto,
        t3.firstName, t3.lastName, t1.source_info,
        t1.numofdays, t1.dayprice, t1.totalprice
        FROM carbooking AS t1
        INNER JOIN car AS t2 ON t1.carid= t2.id
        INNER JOIN customers AS t3 ON t1.customerid = t3.id
        where t1.status = 2
        ';

        var $book_details = '
        SELECT t1.id, t2.name, t1.datefrom, t1.dateto,
        t3.firstName, t3.email, t3.phone, t1.source_info,
        t1.numofdays, t1.dayprice, t1.totalprice,
        t1.pickup_loc, t1.return_loc, t1.note, t1.hotel, t1.roomnumber
        FROM carbooking AS t1
        INNER JOIN car AS t2 ON t1.carid= t2.id
        INNER JOIN customers AS t3 ON t1.customerid = t3.id
        where t1.id =
        ';

        function all_reservations_in_progress(){

            return $this->db->query($this->reservations_in_progress)->result_array();

        }

        function all_reservations_on_hold(){

            return $this->db->query($this->reservations_on_hold)->result_array(); 

        }
        
        function all_finish_reservations() {
            return $this->db->query($this->finish_reservations)->result_array();
        }

        function read($id) {
            return $this->db->where('id',$id)->get('carbooking')->row_array();
        }

        function modify_date($id, $datetom){

            $data = array('dateto'=>$datetom);
            $this->db->where('id',$id)->update('carbooking',$data);

            //echo $this->db->last_query()."<br />";

        }

        function check_available_extend($bookid, $carid, $datetom){

            $row = $this->read($bookid);
            $datetimefrom = $row['datefrom'];
            $datetimeto = $row['dateto'];

            $query = "SELECT * FROM carbooking
            WHERE (datefrom <= ".$datetom." and ".$datetom."<=dateto)
            AND (status = 1 or status = 3 or status = 0)
            AND carid = ".$carid;

            $notavailable = array();
            $q = $this->db->query($query)->result_array();

            foreach($q as $one) {
                $notavailable[] = $one['carid'];
            }

            //echo $this->db->last_query()."<br />";

            if(count($notavailable) > 0) {
                return FALSE;
                //echo 'count($notavailable) > 0 == TRUE<br />';
            }else{
                return TRUE;
                //echo 'car is available to extend<br />';
            }
        }

        function check_modify_date(){

            /*$_POST['carbookingid'] = 675;
            $_POST['datetom'] = '09.09.2011 12:59:00';*/

            $row = $this->read($this->input->post('carbookingid'));


            $id = $row['id'];
            $carid = $row['carid'];
            $datefrom = $row['datefrom'];
            $dateto = $row['dateto'];
            $datetom = strtotime($this->input->post('datetom'));

            /*$format = "%d.%m - %H:%i".' h';
            echo 'carid: '.$carid.'<br />';
            echo 'datefrom: &nbsp;&nbsp;&nbsp;'.$datefrom.' - '.mdate($format, $datefrom).'<br />';
            echo 'dateto: &nbsp;&nbsp;&nbsp;'.$dateto.' - '.mdate($format, $dateto).'<br />';
            echo 'datetom: '.$datetom.' - '.mdate($format, $datetom).'<br />';*/

            $msg = '';
            $action = FALSE;

            if($datetom<=$datefrom){
                // Error.<br />Extended date must me greater than pickup date.<br />
                $msg = "Extended date must me greater than pickup date";
                $action = FALSE;
            }else if($datetom<$dateto){
                    $this->modify_date($id, $datetom);
                    // Successful change booking operation.
                    $msg = "Successful change booking operation";
                    $action = TRUE;
                }else if($datetom>$dateto){
                        // datetoextend is greater then dateto in db. 
                        // check if car is available for extend
                        if($this->check_available_extend($id, $carid, $datetom)){
                            $this->modify_date($id, $datetom);
                            // Successful change booking operation.
                            $msg = "Successful change booking operation"; 
                            $action = TRUE;
                        }else{
                            // Car is not available to extend.
                            $msg = "Car is not available to extend.";
                            $action = FALSE;
                        }
                    }else if($datetom==$dateto){
                            // Extended date is same with date to in db.
                            $msg = "Extended date is same with date to in db.  ";
                            $action = FALSE;
                        }else{

                            // Something wrong.<br />Please try again.
                            $msg = "Something wrong.<br />Please try again.";
                            $action = FALSE;
            }

            echo json_encode(array('success'=>'success','msg'=>$msg, 'action'=>$action));


        }

        function readStatus0_details($id) {
            return $this->db->query($this->book_details.$id)->result_array();
        }

        function readStatus0_ac_details($id) {

            $q = '
            SELECT cbaccessories.*, 
            accessorydescription.type, accessorydescription.description, accessorydescription.price            
            FROM (`cbaccessories`) JOIN 
            accessorydescription ON cbaccessories.adId = accessorydescription.id
            WHERE `carBookingId` = '.$id.' 
            ';
            $res = $this->db->query($q)->result_array();
            //echo $this->db->last_query();
            return $res;
        }

        function stop_booking() {
            $this->db->where('id',$this->input->post('id'))->update('carbooking',array('status' => 4));
            echo json_encode(array('success'=>'success'));
        }

        function end_booking() {
            $this->db->where('id',$this->input->post('id'))->update('carbooking',array('status' => 2));
            echo json_encode(array('success'=>'success'));
        }

    }

?>
