<?php 
   class Userview extends CI_Controller {
	
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
      }

      public function index(){
        $user_id = $this->session->userdata('id');
        $query = $this->db->get_where("user",array("id"=>$user_id));
        $data['data'] = $query->result();
            $this->load->view('user',$data);
      }

      
     public function edit() {
        $user_id = $this->session->userdata('id');
        $query = $this->db->get_where("user",array("id"=>$user_id));
        $data['data'] = $query->result();
        $this->load->view('edit',$data);
     }

     public function editsave() {
         if(!isset($_POST['email'])||!isset($_POST['pass'])||!isset($_POST['name'])){
            $this->load->view('index.html'); 
           }
           else{
        $user_id = $this->session->userdata('id');
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
            redirect(base_url().'userview', 'refresh');
         }
         else{
            $this->load->view('test');
         }
        }
    }

      public function delete(){
        $id = $this->session->userdata('id');
            $res=$this->db->delete("user", "id=$id");
        if($res){
            foreach (array_keys($this->session->userdata) as $key)
            {
            $this->session->unset_userdata($key);
            }
            redirect(base_url(), 'refresh');
         }
         else{
             //error
            $this->load->view('test');
        } 
      }
      
      public function upload(){
          
      }

      public function logout(){
        foreach (array_keys($this->session->userdata) as $key)
        {
        $this->session->unset_userdata($key);
        }
        redirect(base_url(), 'refresh');

      }

        public function user_delete() {
            $this->load->model('User');
    
            $user_id = $this->uri->segment('3');
            $query = $this->db->get_where("user",array("id"=>$user_id));
            $data['data'] = $query->result();
    
            //take the email id from here
    
            $email=$data->email;

            $data = array( 
                'email' => $email,
                'pass' => $this->input->post('pass')
             );

             $query = $this->db->get_where("user",array("email"=> $email, "pass"=>$pass ));
    
             if($query){
                $res=$this->User->delete($data);
                if($res){
                    $this->load->view('registration');
                }
                else{
                    //not delete error
                }
             }
             else{
                //error password not correct
            }
        }

        public function admin_delete() {
            $this->load->model('User');
    
            $user_id = $this->uri->segment('3');
            $query = $this->db->get_where("user",array("id"=>$user_id));
            $data['data'] = $query->result();
    
            //take the email id from here
    
            $email=$data->email;
            $role=$data->role;

            if($role=='admin'){
                $usdata = array( 
                    'email' => $this->input->post('email')
                 );
                 $res=$this->User->delete($usdata);
                 if($res){
                    $this->load->view('admin',);
                }
                else{
                    //not delete error
                }
            }
            else{
                //not admin error
            }
        }
   }

?>
