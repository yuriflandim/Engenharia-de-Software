<?php

class EnderecoModel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function add($dados){
        return $this->db->insert("user",$dados);
    }
    
}

