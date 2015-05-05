<?php

class EnderecoModel extends CI_Model {

    private $table = "endereco";
    
    public function __construct() {
        parent::__construct();
    }

    public function add($datas) {
        
        unset($datas['id_estado']);
        
        $this->db->set($datas);
        $response = $this->db->insert($this->table);
        
        if ($response) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

}
