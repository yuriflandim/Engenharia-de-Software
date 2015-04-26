<?php

class UserModel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function newUser($dados){
        return $this->db->insert("user",$dados);
    }
    
    public function updateUser($name,$email){
        $this->db->set("name",$name);
        $this->db->set("email",$email);
        $this->db->insert("user");
        
    }
    
    public function listAll(){
        $result = $this->db->get('user');
        return $result;
    }
    public function deleteUser($name,$email){
        $this->db->set("name",$name);
        $this->db->set("email",$email);
        $this->db->insert("user");
        
    }
}

