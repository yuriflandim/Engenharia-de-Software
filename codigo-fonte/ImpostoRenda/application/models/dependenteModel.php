<?php

class DependenteModel extends CI_Model{
    
    private $table = "deducao_dependente";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getValor($qtde_dependente){
        
        $this->db->select("valor");
        $this->db->where("ano_virgencia",date("Y"));
        $result = $this->db->get($this->table)->row();
        
        if($result){
            return $qtde_dependente * $result->valor;
        }else{
            return false;
        }
        
    }
    
    public function listAll($ano = null){
        
        if(is_null($ano)){
            $this->db->where("ano_virgencia", date("Y"));
        }else{
            $this->db->where("ano_virgencia", $ano);
        }
        
        $result = $this->db->get($this->table)->row();
        return $result;
    }
    
}

