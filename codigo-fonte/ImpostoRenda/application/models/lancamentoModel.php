<?php

class lancamentoModel extends CI_Model{
    
    private $table = "lancamento";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function lastInsert($qtde = 10){
        $this->db->select("*");
        $this->db->join("cliente","cliente.id = {$this->table}.id_cliente","inner");
        $this->db->join("base","base.id = {$this->table}.id_base","inner");
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
    
    public function getByBase($id){
        $this->db->where("id_base",$id);
        return $this->db->get($this->table)->result();
    }
    
    public function add($data){
        return $this->db->insert($this->table,$data);
    }
    
}