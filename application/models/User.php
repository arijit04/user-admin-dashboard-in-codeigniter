<?php 
   Class User extends CI_Model {
	
      Public function __construct() { 
         parent::__construct(); 
      }
      
      public function insert($data) { 
         if ($this->db->insert("user", $data)) { 
            return true; 
         } 
         else{
            return FALSE;
         }
      }

      public function update($data,$id) {
         $this->db->set($data); 
         $this->db->where("id", $id); 
         if ($this->db->update("user", $data)) { 
            return true; 
         } 
         else{
            return FALSE;
         }
      }
   } 
?>