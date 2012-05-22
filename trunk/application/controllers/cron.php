<?php
    class Cron extends CI_Controller 
    {

        function __construct()
        {
            parent::__construct();

            $this->load->helper('date'); 

        }

        function index() { show_404(); } 

        /* 
        LISTA SVE BOOKINGE U TOKU 
        PRIKAZUJE KAO HTML TABELU - 
        STATUS (1 ili 3)
        */
        function unit_listbookinginprogress()
        {
            //load the parser library
            $this->load->library('parser');

            echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> ';
            echo '<html><head>';
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
            echo '<style>body{font-size:12px;}</style>';
            echo '<style>table,tr,td{font-size:12px; border:1px dotted #dedede}</style>';
            echo '<style>td{padding:4px}</style>';
            echo '</head><body>';

            echo $this->unit_listbookinginprogress_cont();

            echo '</body></html>';

        }

        function unit_listbookinginprogress_cont(){

            $status1 = $this->statusm->readStatus0();
            //$status1 = $this->statusm->readStatus1();

            $html = '';
            $html.= '<table cellpadding="0" cellspacing="0" border="1">';

            $html.= '<thead>';
            $html.= '<tr>';
            $html.= '<td><b>CAR</b></td>';
            $html.= '<td><b>DATES</b></td>';
            $html.= '<td><b>CLIENT</b></td>';
            $html.= '<td><b>SOURCE</b></td>';
            $html.= '<td><b>NO. DAYS</b></td>';
            $html.= '</tr>';
            $html.= '</thead>';

            $html.= '<tbody>';

            foreach($status1 as $row){


                $html .= "<tr>";

                $html .= "<td>";
                $html .= $row['id']." - ".$row['name'];
                $html .= "</td>";     

                $format = "%d.%m %h:%i"; 
                $timefrom = $row['datefrom'];  
                $timeto = $row['dateto'];  

                $html .= "<td>";
                $html .= mdate($format, $timefrom).' h / '.mdate($format, $timeto).' h';
                $html .= "</td>";

                $html .= "<td>";
                $html .= $row['firstName']." - ".$row['lastName'];
                $html .= "</td>"; 

                $html .= "<td>";
                $html .= $row['source_info'];
                $html .= "</td>";

                $html .= "<td>";
                $html .= $row['numofdays'];
                $html .= "</td>";      

                $html .= "</tr>";

            }

            $html.= '</tbody>';

            return  $html;


        }

        function unit_compare_times(){

            //test //$this->db->where('id',$row['id'])->update('carbooking',array('status'=>'2'));


            $query1 = 'SELECT t1.id, t2.name, t1.datefrom, t1.dateto,
            t3.firstName, t3.lastName, t1.source_info, 
            t1.numofdays, t1.dayprice, t1.totalprice 
            FROM carbooking AS t1 
            INNER JOIN car AS t2 ON t1.carid= t2.id 
            INNER JOIN customers AS t3 ON t1.customerid = t3.id
            where (t1.status = 1 or t1.status = 3)';

            $query0 = 'SELECT t1.id, t2.name, t1.datefrom, t1.dateto,
            t3.firstName, t3.lastName, t1.source_info,
            t1.numofdays, t1.dayprice, t1.totalprice
            FROM carbooking AS t1
            INNER JOIN car AS t2 ON t1.carid= t2.id
            INNER JOIN customers AS t3 ON t1.customerid = t3.id
            where t1.status = 0';

            $query1 .= ' and t1.user_id = 7 order by t1.datefrom asc';
            $query0.=' and t1.user_id = 7 order by t1.datefrom asc';


            //Rezervacije u toku
            $status1 = $this->db->query($query1)->result_array();           

            foreach($status1 as $row){
                $timeto = (int)$row['dateto'];
                $now = (int)time();

                if($timeto<$now){
                    $this->db->where('id',$row['id'])->update('carbooking',array('status'=>'2'));
                }


            }

            //rezervacije na cekajnu
            $status0 = $this->db->query($query0)->result_array();

            foreach($status0 as $row){ 
                $timefrom = (int)$row['datefrom'];
                $now = (int)time();

                if($timefrom<$now){
                    $this->db->where('id',$row['id'])->update('carbooking',array('status'=>'1'));    
                }

            } 

        } 

}