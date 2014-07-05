<?php


    /**
    * @author Logic
    * @version 1.0
    * @created 04-Mar-2012 5:05:37 PM
    */
    class Bsession
    {

        var $_ci;

        function Bsession()
        {
            $this->_ci =& get_instance();
            $this->_ci->config->set_item('sess_table_name', 'ci_sessions');
            $this->_ci->load->library('session');
            $this->_ci->load->library('class_model/booking');

            $this->_ci->session->set_userdata('source_info', 'www.informacionisistem.com');
        }



        function step1()
        {
        }

        function step2()
        {


            if(isset($_POST['pickup_loc_id'])){
                $locs = $this->_ci->booking->locations();
                if($locs){

                    unset($_POST['formReservationStep1Submit']);
                    unset($_POST['formReservationBasicDataSubmit']);
                    unset($_POST['continue']);

                    foreach ($locs as $location){
                        if($location->id==$_POST['pickup_loc_id']){
                            $_POST['pickup_loc_id'] = $location->id;
                            $_POST['pickup_loc_text'] = $location->text;                            
                            $_POST['pickup_loc_value'] = $location->value;
                        }
                        if($location->id==$_POST['return_loc_id']){
                            $_POST['return_loc_id'] = $location->id;
                            $_POST['return_loc_text'] = $location->text;
                            $_POST['return_loc_value'] = $location->value;
                        }
                    }

                    $this->_ci->session->set_userdata($_POST);
                    //print_r($this->_ci->session->all_userdata()).'<br />';
                }
            }


        }

        function step3($car)
        {
            
            if(isset($_POST['carid']))
                $_GET['id'] = $_POST['carid'];

            if($this->_ci->session->userdata('car_id')!=$_GET['id']){
                $this->_ci->session->unset_userdata('extras');
            }
            $this->_ci->session->set_userdata(array('car_id'=>$_GET['id']));

            $no_days = $this->_ci->bsession->get('no_days');
            //echo $no_days;

            //        Car price per day - and total
            switch($no_days){

                case $no_days<=3:
                    $this->_ci->session->set_userdata('day_price', $car[0]->day13price);
                    break;

                case $no_days>=4 && $no_days<=7:
                    $this->_ci->session->set_userdata('day_price', $car[0]->day47price);
                    break;

                case $no_days>=8 && $no_days<=15:
                    $this->_ci->session->set_userdata('day_price', $car[0]->day815price);
                    break;
            }

        }

        function extras()
        {
            /* Post optional accesories
            * If not, emty array
            */
            $extras = array();

            if(isset($_POST['extras'])){

                foreach($_POST['extras'] as $key=>$value){
                    $extras[] = $key;
                }
            }

            $this->_ci->session->set_userdata('extras', $extras);

        }

        function client(){

            $client = array(
            'cust_name' => urlencode($this->_ci->input->post('name')), 
            'cust_email' => urlencode($this->_ci->input->post('email')),
            'cust_phone' => urlencode($this->_ci->input->post('phone')),
            'cust_hotel' => urlencode($this->_ci->input->post('hotel')),
            'cust_roomnumber' => urlencode($this->_ci->input->post('roomnumber')),
            'cust_note' => urlencode($this->_ci->input->post('notice')),
            'cust_terms' => $_POST['termsOfTradeAcceptance']
            );

            $this->_ci->session->set_userdata($client);

        }

        function booking($cb_id){

            $this->_ci->session->set_userdata('carbooking_id',$cb_id);

        }

        function get($key)
        {

            return $this->_ci->session->userdata($key);

        }

        function set($key,$value)
        {

            return $this->_ci->session->set_userdata($key,$value);

        }

        function get_all_data(){

            return $this->_ci->session->all_userdata();

        }

        function check_session(){

            if(!$this->_ci->session->userdata('pickup_loc_id'))
                redirect(base_url());

        }

    }
?>
