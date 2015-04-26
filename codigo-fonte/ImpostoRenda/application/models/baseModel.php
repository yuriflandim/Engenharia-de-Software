<?php

class BaseModel extends CI_Model{
    
    private $table = "base";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getById($id){
        $this->db->where("id",$id);
        $result = $this->db->get($this->table)->row();
        return $result;
    }
    
    public function listAll(){
        $this->db->order_by("valor_inicial");
        $result = $this->db->get($this->table)->result();
        return $result;
    }
    
    public function add($datas){
        return $this->db->insert("base", $datas);
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

