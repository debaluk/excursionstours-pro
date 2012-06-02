<?php
    require_once($application_folder."/controllers/navigator.php");
    class Transactions extends navigator 
    {

        function __construct()
        {
            parent::__construct();
            
            /****************************************************
            *  CHECK FOR LOGIN
            ****************************************************/    
            
            if(!$this->session->userdata('logged_in')){
                redirect(base_url());   
            }

            $this->load->config('merchant');
            $cnfg_mrchnt = array(
            'url' => $this->config->item('ecomm_server_url'),
            'keystore' => $this->config->item('cert_url'),
            'keystorepassword' => $this->config->item('cert_pass'),
            1
            );
            $this->load->library('merchant',$cnfg_mrchnt);
            $this->load->library('form_validation');
            $this->load->model('transactions_model');

        }

        function index() { show_404(); }

        function view_all_transactions(){
            $data['title'] = "View All Transactions"; 
            $data['transactions'] = $this->transactions_model->view_all_transactions();  
            $this->core_site('transactions','view_all_transactions',NULL,$data); 

        }

        function confirm_dms($id){
            $data['title'] = "Make DMS"; 
            $data['confirm_dms'] = $this->transactions_model->confirm_dms($id); 
            $this->core_site('transactions','confirm_dms',NULL,$data);

        }
        
        function confirm_reverse($id){
            $data['title'] = "Reverse"; 
            $data['confirm_reverse'] = $this->transactions_model->confirm_reverse($id);
            $this->core_site('transactions','confirm_reverse',NULL,$data);

        }
        
        function confirm_cbd(){
             $data['title'] = "Close Business Day"; 
            $this->core_site('transactions','confirm_cbd',NULL,$data);

        }

        function do_transaction_dms(){
            $this->transactions_model->do_transaction_dms(); 
        }
        
        function do_reverse_transaction_dms(){
            $this->transactions_model->do_reverse_transaction_dms(); 
        }
        
        function do_cbd(){
            $this->transactions_model->do_cbd();
        }             
}