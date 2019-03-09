<?php 
   class Registration extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('url', 'form'));
         $this->load->library(array('session', 'email', 'table'));
         $this->load->database(); 
      } 

      public function index(){
        $this->load->model('User');

        if (!isset($_POST['name'])||!isset($_POST['email'])||!isset($_POST['pass'])||!isset($_POST['role'])){
         $this->load->view('index.html'); 
        }
        else{

         $data = array( 
            'name' => $this->input->post('name'), 
            'email' => $this->input->post('email'),
            'pass' => $this->input->post('pass'),
            'role' => $this->input->post('role')  
         ); 
            
         $res=$this->User->insert($data); 
 
         if($res){
            redirect(base_url(), 'refresh');
         }
         else{
            $this->load->view('test');
         }
        }  
      }
 
   } 
?> 