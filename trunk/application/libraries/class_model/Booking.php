<?php


    /**
    * @author AbordageSol
    * @version 1.0
    * @created 03-Mar-2012 12:22:41 PM
    */
    require_once("ErrorHandler.php");
    class Booking extends ErrorHandler
    {

        var $_ci;

        function Booking()
        {
            $this->_ci =& get_instance();
            $this->_ci->load->library('class_model/communicator');
        }

        /**
        * 
        * @param session
        * return carbooking.id
        */
        function AddToBooking($session)
        {

            //echo "AddToBooking -> $session";

            $post = array(
            'session'=>$session
            );

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('process_booking', $post);

            //test for valid json
            return $this->test_response($srv_res);
        }

        /**
        * 
        * @param booking_id
        * @param car_id
        */
        function ShowOrder($booking_id)
        {
            if(!isset($booking_id)){
                echo 'Error ocured.<br /> booking_id is not set.';
                exit();
            }

            $post = array(
            'carbooking_id'=>$booking_id
            );

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('show_order', $post);

            /*$data = array();
            $data[0] = $this->test_response($srv_res[0]);
            $data[1] = $this->test_response($srv_res[1]);*/
            //test for valid json
            return $srv_res;

        }

        function TransactionResult($trans_id){

            if(!isset($trans_id)){
                echo 'Error ocured.<br /> trans_id is not set.';
                exit();
            }

            $post = array(
            'trans_id'=>$trans_id
            );

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('show_transaction', $post);

            /*$data = array();
            $data[0] = $this->test_response($srv_res[0]);
            $data[1] = $this->test_response($srv_res[1]);*/
            //test for valid json
            return $srv_res;

        }

        function FindType($trans_id){

            if(!isset($trans_id)){
                echo 'Error ocured.<br /> trans_id is not set.';
                exit();
            }

            $post = array(
            'trans_id'=>$trans_id
            );

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('find_type', $post);

            return $this->test_response($srv_res);

        }

        function FindId($trans_id, $type){

            if(!isset($trans_id)){
                echo 'Error ocured.<br /> trans_id is not set.';
                exit();
            }
            if(!isset($type)){
                echo 'Error ocured.<br /> booking_type is not set.';
                exit();
            }

            $post = array(
            'trans_id'=>$trans_id,
            'type'=>$type
            );

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('find_id', $post);

            return $this->test_response($srv_res);

        }
        
        function UpdateStatus($type,$id){

            if(!isset($id)){
                echo 'Error ocured.<br /> booking_id is not set.';
                exit();
            }
            if(!isset($type)){
                echo 'Error ocured.<br /> booking_type is not set.';
                exit();
            }

            $post = array(
            'id'=>$id,
            'type'=>$type
            );

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('update_booking', $post);

            return $srv_res;

        }

        function locations(){

            //Get Data - informacionisistem.com
            $srv_res = $this->_ci->communicator->communicate('locations');

            //test for valid json
            return $this->test_response($srv_res);

        }

    }
?>