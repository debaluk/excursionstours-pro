<?php
class Login extends CI_Controller 
{

    function __construct()
    {
        parent::__construct(); 
        
        $this->load->library('form_validation');
        $this->load->library('simple_login_secure');
    }

    function index(){ 

        $this->view_loginform();

    } 

    function test_login(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url().'login/view_loginform');    
        }
        echo 'Only to see by logged user!';
    }

    function view_loginform(){

        if($this->session->userdata('logged_in')){
            redirect(base_url().'reservation/view_all_reservations');   
        }else{
            $this->load->view('loginform');
        }        

    }

    function view_newuserform(){

        $this->load->view('newuserform');

    }

    function loginuser(){

        if($this->validloginform()) {
            if($this->simple_login_secure->login($_POST['email'], $_POST['password'])){
                //echo 'User loged to CMS.';
                $this->view_loginform(); 
            }else{
                $data['logerror'] = 'Molimo unesite ispravne pristupne podatke.';
                $this->load->view('loginform',$data);
            }
        }
        else{
            $this->load->view('loginform');
        }

    }

    function newuser(){

        if($this->validnewuserform()) { 
            if($this->simple_login_secure->create()){
                echo 'User added to DB.';
            }else{
                echo 'DB Error!<br />User not added to DB.';
            }
        }
        else{
            $this->load->view('newuserform'); 
        }

    }

    function logout(){
        $this->simple_login_secure->logout();
        redirect(base_url());
    }

    function validloginform() {

        $this->form_validation->set_rules('email','<b>username</b>','trim|xss_clean|required');        
        $this->form_validation->set_rules('password','<b>password</b>','trim|xss_clean|required');

        $this->form_validation->set_message('required','Please enter %s!'); 
        //$this->form_validation->set_message('valid_email','Field %s must be valid email address!'); 

        return $this->form_validation->run();

    }

    function validnewuserform() {

        $this->form_validation->set_rules('nicename','<b>Niciname</b>','trim|xss_clean|required');        
        $this->form_validation->set_rules('email','<b>email</b>','trim|xss_clean|required|valid_email');        
        $this->form_validation->set_rules('password_one','<b>password</b>','trim|xss_clean|required');
        $this->form_validation->set_rules('password_two','<b>password again</b>','trim|xss_clean|required|matches[password_one]');

        $this->form_validation->set_message('required','Please enter %s!'); 
        $this->form_validation->set_message('valid_email','Field %s must be valid email address!');
        $this->form_validation->set_message('matches','<b>Passwords</b> must mach!');

        return $this->form_validation->run();

    }

}