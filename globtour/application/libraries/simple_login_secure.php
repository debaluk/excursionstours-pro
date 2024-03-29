<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    define('PHPASS_HASH_STRENGTH', 8);
    define('PHPASS_HASH_PORTABLE', false);

    /**
    * SimpleLoginSecure Class
    *
    * Makes authentication simple and secure.
    *
    * Simplelogin expects the following database setup. If you are not using 
    * this setup you may need to do some tweaking.
    *   
    * 
    *   CREATE TABLE `users` (
    *     `user_id` int(10) unsigned NOT NULL auto_increment,
    *     `user_email` varchar(255) NOT NULL default '',
    *     `user_pass` varchar(60) NOT NULL default '',
    *     `user_date` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT 'Creation date',
    *     `user_modified` datetime NOT NULL default '0000-00-00 00:00:00',
    *     `user_last_login` datetime NULL default NULL,
    *     PRIMARY KEY  (`user_id`),
    *     UNIQUE KEY `user_email` (`user_email`),
    *   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    * 
    * @package   SimpleLoginSecure
    * @version   1.0.1
    * @author    Alex Dunae, Dialect <alex[at]dialect.ca>
    * @copyright Copyright (c) 2008, Alex Dunae
    * @license   http://www.gnu.org/licenses/gpl-3.0.txt
    * @link      http://dialect.ca/code/ci-simple-login-secure/
    */
    class simple_login_secure
    {
        var $CI;
        var $user_table = 'users';

        /**
        * Create a user account
        *
        * @access	public
        * @param	string
        * @param	string
        * @param	bool
        * @return	bool
        */
        function create($auto_login = false) 
        {
            $this->CI =& get_instance();

            //Hash user_pass using phpass
            $user_pass_hashed = md5($_POST['password_one']);
            
            //Insert account into the database
            
            $data = array(               
                'name' => $_POST['name'],                              
                'email' => $_POST['email'],                
                'password' => $user_pass_hashed,          
                'date' => time()                     
                );
 
            $this->CI->db->set($data); 

            if(!$this->CI->db->insert($this->user_table)) //There was a problem! 
                return false;						

            if($auto_login)
                $this->login($user_email, $user_pass);

            return true;
        }

        /**
        * Login and sets session variables
        *
        * @access	public
        * @param	string
        * @param	string
        * @return	bool
        */
        function login($user_email = '', $user_pass = '') 
        {
            $this->CI =& get_instance();

            if($user_email == '' OR $user_pass == '')
                return false;


            //Check if already logged in
            if($this->CI->session->userdata('email') == $user_email)
                return true;


            //Check against user table
            $this->CI->db->where('email', $user_email); 
            $query = $this->CI->db->get_where($this->user_table);


            if ($query->num_rows() > 0) 
            {
                $user_data = $query->row_array(); 
                
                if(md5($user_pass) != $user_data['password'])
                    return false;

                //Destroy old session
                $this->CI->session->sess_destroy();

                //Create a fresh, brand new session
                $this->CI->session->sess_create();
                
                $this->CI->db->simple_query('UPDATE ' . $this->user_table  . ' SET lastlogin = '.time().', lastip = "'.$this->CI->input->ip_address().'"  WHERE id = ' . $user_data['id']);


                //Set session data
                unset($user_data['password']);               
                
                $user_data['email'] = $user_data['email'];
                $user_data['logged_in'] = true;
                $user_data['name'] = $user_data['name'];
                $user_data['date'] = $user_data['date'];
                $user_data['id'] = $user_data['id'];
                
                $this->CI->session->set_userdata($user_data);

                return true;
            } 
            else 
            {
                return false;
            }	

        }

        /**
        * Logout user
        *
        * @access	public
        * @return	void
        */
        function logout() {
            $this->CI =& get_instance();		

            $this->CI->session->sess_destroy();
        }

        /**
        * Delete user
        *
        * @access	public
        * @param integer
        * @return	bool
        */
        function delete($user_id) 
        {
            $this->CI =& get_instance();

            if(!is_numeric($user_id))
                return false;			

            return $this->CI->db->delete($this->user_table, array('id' => $user_id));
        }

    }
?>
