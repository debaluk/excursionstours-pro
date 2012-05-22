<?php

    class Transactions_model extends CI_Model{

        var $page_TYPES = array('car');

        function __construct(){
            parent::__construct();
        }

        function view_all_transactions(){

            RETURN $this->db->order_by('id','desc')->get('transaction')->result_array();

        }

        function confirm_dms($id){

            $sql = mysql_query("SELECT * FROM ".$this->config->item('m_db_table_transaction')." WHERE `id`='$id'");

            if (!$sql) {
                die('*** Invalid query: ' . mysql_error());
            }
            $row = mysql_fetch_row($sql);
            return $row;
        }

        function confirm_reverse($id){
            $sql = mysql_query("SELECT * FROM ".$this->config->item('m_db_table_transaction')." WHERE `id`='$id'");

            if (!$sql) {
                die('*** Invalid query: ' . mysql_error());
            }
            $row = mysql_fetch_row($sql);
            return $row;
        }

        function do_transaction_dms(){
            if($this->validate()){

                $trans_id= urlencode($this->input->post('trans_id'));
                $amount = $this->input->post('amount')*100;
                $id =$this->input->post('id'); //for getting MySQL data


                $result = mysql_query("SELECT * FROM ".$this->config->item('m_db_table_transaction')." WHERE `id`='$id'");
                if (!$result) {
                    die('*** Invalid query: ' . mysql_error());
                }
                $row = mysql_fetch_row($result);
                $auth_id = urlencode($row[1]);
                $currency = urlencode($row[3]);
                $ip = urlencode($row[4]);
                $desc = urlencode($row[5]);
                $language = urlencode($row[6]);


                $resp = $this->merchant->makeDMSTrans($auth_id, $amount, $currency, $ip, $desc, $language);     
                if (substr($resp,8,2)=="OK") {
                    $trans_id = $row[1];

                    $result = mysql_query("UPDATE ".$this->config->item('m_db_table_transaction')." SET `dms_ok` = 'YES', makeDMS_amount = '$amount' WHERE `trans_id` = '$trans_id'");

                    if (!$result) {
                        die('*** Invalid query: ' . mysql_error());
                    }
                    echo json_encode(array('success'=>'success','message'=>$resp));
                }
                else{
                    echo json_encode(array('success'=>'failed','message'=>$resp)); 
                    $resp = htmlentities($resp, ENT_QUOTES);
                    $sql = mysql_query("INSERT INTO ".$this->config->item('m_db_table_error')." VALUES ('', now(), 'makeDMSTrans', '$resp')
                        ");

                    if (!$sql) {
                        die('*** Invalid query2: ' . mysql_error());
                    }

                }  

            }else{
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }

        }

        function do_reverse_transaction_dms(){   
            if($this->validate()){

                $id = $this->input->post('id'); //for getting MySQL data

                //print_r($id);
                
                $sql = mysql_query("SELECT * FROM ".$this->config->item('m_db_table_transaction')." WHERE `id`='$id'");

                if (!$sql) {
                    die('*** Invalid query: ' . mysql_error());
                }
                $row = mysql_fetch_row($sql);

                $trans_id= urlencode($row[1]);
                $amount = $this->input->post('amount')*100;

                $resp = $this->merchant->reverse($trans_id, $amount);

                /*$this->firephp->fb('trans_id: '.$trans_id);
                $this->firephp->fb('amount: '.$amount);
                $this->firephp->fb('$resp '.$resp);  */

                if (substr($resp,8,2) == "OK" OR substr($resp,8,8) == "REVERSED") {           
                    $this->firephp->fb('$resp '.$resp); 

                    if (strstr($resp, 'RESULT:')) {
                        $result = explode('RESULT: ', $resp);
                        $result = preg_split( '/\r\n|\r|\n/', $result[1] );
                        $result = $result[0];
                    }else{
                        $result = '';
                    }

                    if (strstr($resp, 'RESULT_CODE:')) {
                        $result_code = explode('RESULT_CODE: ', $resp);
                        $result_code = preg_split( '/\r\n|\r|\n/', $result_code[1] );
                        $result_code = $result_code[0];
                    }else{
                        $result_code = '';
                    } 


                    $trans_id = $row[1];

                    $sql = mysql_query("UPDATE ".$this->config->item('m_db_table_transaction')." SET `reversal_amount` = '$amount', `result_code` = '$result_code', `result` = '$result', `response` = '$resp' WHERE `trans_id` = '$trans_id'");

                    if (!$sql) {
                        die('*** Invalid query: ' . mysql_error());
                    }else{
                        echo json_encode(array('success'=>'success','message'=>$resp)); 
                    }

                }
                else{
                    echo json_encode(array('success'=>'failed','message'=>$resp));
                    $resp = htmlentities($resp, ENT_QUOTES);
                    $sql = mysql_query("INSERT INTO ".$this->config->item('m_db_table_error')." VALUES ('', now(), 'reverse', '$resp')"); 

                    if (!$sql) {
                        die('*** Invalid query222: ' . mysql_error());
                    }
                }

            }else{
                echo json_encode(array('success'=>'failed','message'=>$this->errors));
            }
        }
        
        function do_cbd(){

            $resp = $this->merchant->closeDay(); 
            if (strstr($resp, 'RESULT:')) {

                //RESULT: OK RESULT_CODE: 500 FLD_075: 4 FLD_076: 6 FLD_087: 40 FLD_088: 60  

                if (strstr($resp, 'RESULT:')) {
                    $result = explode('RESULT: ', $resp);
                    $result = preg_split( '/\r\n|\r|\n/', $result[1] );
                    $result = $result[0];
                }else{
                    $result = '';
                }

                if (strstr($resp, 'RESULT_CODE:')) {
                    $result_code = explode('RESULT_CODE: ', $resp);
                    $result_code = preg_split( '/\r\n|\r|\n/', $result_code[1] );
                    $result_code = $result_code[0];
                }else{
                    $result_code = '';
                }

                if (strstr($resp, 'FLD_075:')) {
                    $count_reversal = explode('FLD_075: ', $resp);
                    $count_reversal = preg_split( '/\r\n|\r|\n/', $count_reversal[1] );
                    $count_reversal = $count_reversal[0];
                }else{
                    $count_reversal = '';
                }

                if (strstr($resp, 'FLD_076:')) {
                    $count_transaction = explode('FLD_076: ', $resp);
                    $count_transaction = preg_split( '/\r\n|\r|\n/', $count_transaction[1] );
                    $count_transaction = $count_transaction[0];
                }else{
                    $count_transaction = '';
                }

                if (strstr($resp, 'FLD_087:')) {
                    $amount_reversal = explode('FLD_087: ', $resp);
                    $amount_reversal = preg_split( '/\r\n|\r|\n/', $amount_reversal[1] );
                    $amount_reversal = $amount_reversal[0];
                }else{
                    $amount_reversal = '';
                }

                if (strstr($resp, 'FLD_088:')) {
                    $amount_transaction = explode('FLD_088: ', $resp);
                    $amount_transaction = preg_split( '/\r\n|\r|\n/', $amount_transaction[1] );
                    $amount_transaction = $amount_transaction[0];
                }else{
                    $amount_transaction = '';
                }



                $sql = mysql_query("INSERT INTO ".$this->config->item('m_db_table_batch')."  VALUES ('', '$result', '$result_code', '$count_reversal', '$count_transaction', '$amount_reversal', '$amount_transaction', now(), '$resp')");

                echo json_encode(array('success'=>'success','message'=>$resp));
            }
            else{
                
                echo json_encode(array('success'=>'filed','message'=>$resp));                
                
                $resp = htmlentities($resp, ENT_QUOTES);
                $sql = mysql_query("INSERT INTO ".$this->config->item('m_db_table_error')." VALUES ('', now(), 'closeDay', '$resp')
                ");

                if (!$sql) {
                    die('*** Invalid query2: ' . mysql_error());

                }
            }


        }

        function validate() {
            $this->form_validation->set_rules('trans_id','trans_id','trim|required');
            $this->form_validation->set_rules('amount','Amount','trim|required|numeric');

            if($this->form_validation->run() == TRUE) {
                return TRUE;
            }else {
                $this->errors = validation_errors(' ','<br />');
                return FALSE;
            }
        }

    }

?>