<?php 
   class Admin extends CI_Controller {
	
      function __construct() { 
        parent::__construct(); 
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session', 'email', 'table'));
        $this->load->database();
        $sessiondata = $this->session->userdata();
        if(!isset($sessiondata['logged_in']) && empty($sessiondata['logged_in'])) 
        { 
            redirect(base_url(), 'refresh');
        }
        if(isset($sessiondata['logged_in']) && !(empty($sessiondata['logged_in']))) 
        { 
            $user_id = $this->session->userdata('id');
            $query = $this->db->get_where("user",array("id"=>$user_id));
            $data = $query->result();
            $role=$data[0]->role;
            if(!($role=='Admin')){
                redirect(base_url().'userview', 'refresh');
            }
        }
      } 

      public function index(){
        $query = $this->db->get("user"); 
        $data['data'] = $query->result();
        $this->load->view('admin',$data);
      }

      public function edit() {
        $this->session->set_userdata('trole', 'Admin');
        $user_id = $this->input->post('id');
        $query = $this->db->get_where("user",array("id"=>$user_id));
        $data['data'] = $query->result();
        $this->load->view('edit',$data);
     }

     public function editsave() {
         if(!isset($_POST['email'])||!isset($_POST['pass'])||!isset($_POST['name'])){
            $this->load->view('index.html'); 
           }
           else{
        $user_id = $this->input->post('id');
        $this->load->model('User');
        $query = $this->db->get_where("user",array("id"=>$user_id));
        $data = $query->result();
        $role=$data[0]->role;
        $email=$data[0]->email;
        $img=$data[0]->img;
        if($role=='Admin'){
            $role = $this->input->post('role');
        }
        else{
            $role= 'User';
        }

        if(!empty($_FILES) && isset($_FILES['file']) && !empty($_FILES['file']) && isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') 
        {
            $config['upload_path']          = './img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000000;
            $config['max_width']            = 1024000;
            $config['max_height']           = 7680000;
            $config['encrypt_name']         = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $imagedata = array('upload_data' => $this->upload->data());
                $img=$imagedata['upload_data']['file_name'];
            // print_r($imagedata);
        }
        else {
            $error = array('error' => $this->upload->display_errors());
            die($error);
        }
    }
        $data = array( 
            'name' => $this->input->post('name'), 
            'email' => $email,
            'pass' => $this->input->post('pass'),
            'role' => $role,
            'img' => $img
         );
         $res=$this->User->update($data,$user_id);
         if($res){
            redirect(base_url().'admin', 'refresh');
         }
         else{
            $this->load->view('test');
         }
        }
    }


      
      public function delete(){
        $id = $this->input->post('id');
        $res=$this->db->delete("user", "id=$id");
        if($res){
            redirect(base_url().'admin', 'refresh');
         }
         else{
             //error
            $this->load->view('test');
         }
      }    
   } 
?> 