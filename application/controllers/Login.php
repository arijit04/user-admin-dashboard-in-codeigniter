<?php 
   class Login extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('url', 'form'));
         $this->load->library(array('session', 'email', 'table'));
         $this->load->database(); 
      } 

      public function index(){
        $this->load->model('User');
        if (!isset($_POST['email'])||!isset($_POST['pass'])){
         $this->load->view('index.html'); 
        }
        else{
         $email = $this->input->post('email');
         $pass = $this->input->post('pass');

      $query = $this->db->get_where("user",array("email"=> $email, "pass"=>$pass));
       //need to add function to check exist or not and next controller redirect
       $data = $query->result();
    //    $query->num_rows()
      if(!empty($data)){
          $userdata = array( 
            'id' => $data[0]->id,
            'name'  => $data[0]->name, 
            'logged_in' => TRUE,
            'token' => 'will add token'
         ); 

         $this->session->set_userdata($userdata);

         $role=$data[0]->role;

         if($role=='Admin'){
            redirect(base_url().'admin', 'refresh');
        }
        else{
            redirect(base_url(), 'refresh');
        }
 
      }
      else{
         //check to show in valid password
         echo"Incorrct password";
       $this->load->view('test'); 
      }
        }
      }
   } 
?> 