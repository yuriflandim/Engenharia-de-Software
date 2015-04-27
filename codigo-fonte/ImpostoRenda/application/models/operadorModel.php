<?php

class OperadorModel extends CI_Model{
    
    private $table = "operador";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function listAll(){
        return $this->db->get($this->table)->result();
    }
    
    public function getById($id){
        $this->db->where("id",$id);
        $result = $this->db->get($this->table)->row();
        return $result;
    }
    
    public function getByEmail($email){
        $this->db->where("email",$email);
        $result = $this->db->get($this->table)->row();
        return $result;
    }
    
    public function add($datas){
        var_dump($datas);
        return $this->db->insert($this->table,$datas);
    }
    
    public function edit($id, $datas){
        $this->db->set($datas);
        $this->db->where("id", $id);
        return $this->db->update($this->table);
    }
    
    public function delete($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }
}

