<?php

class lancamentoModel extends CI_Model{
    
    private $table = "caixa";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lastInsert($qtde = 10){
        
        $this->db->select("*");
        $this->db->join("cliente","cliente.id = {$this->table}.id_cliente","inner");
        $this->db->order_by("{$this->table}.id","DESC");
        $this->db->limit($qtde);
        return $this->db->get($this->table)->result();
    }
    
    public function listAll(){
        return $this->db->get($this->table)->result();
    }
    
    public function getByClient($id){
        $this->db->where("id_cliente",$id);
        return $this->db->get($this->table)->result();
    }
    
    public function add($data){
        
        return $this->db->insert($this->table,array(
            "id_cliente" => $data['cliente'],
            "valor" => $data['valor'],
            "data" => date("Y-m-d H:i:s"),
        ));
        
    }
    
}

