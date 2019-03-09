<?php 
   class User_controller extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('url', 'form'));
         $this->load->library(array('session', 'email', 'table'));
         $this->load->database();
         $sessiondata = $this->session->userdata();
         if(isset($sessiondata['logged_in']) && !(empty($sessiondata['logged_in']))) 
         { 
             $user_id = $this->session->userdata('id');
             $query = $this->db->get_where("user",array("id"=>$user_id));
             $data = $query->result();
             $role=$data[0]->role;
             if(!($role=='Admin')){
                 redirect(base_url()."userview", 'refresh');
             }
             else{
               redirect(base_url()."admin", 'refresh');
             }
         }
      } 

      public function index(){
        $this->load->view('registration');
      } 
   } 
?> 