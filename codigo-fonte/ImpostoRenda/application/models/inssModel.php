<?php

class InssModel extends CI_Model{
    
    private $table = "inss";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function listAll($ano = null){
        $this->db->order_by("valor_inicial");
        
        if(is_null($ano)){
            $this->db->where("ano_virgencia", date("Y"));
        }else{
            $this->db->where("ano_virgencia", $ano);
        }
        
        $result = $this->db->get($this->table)->result();
        return $result;
    }
    
    public function getAliquota($valor){
        
        $this->db->select("valor_inicial,valor_final,aliquota");
        $this->db->where("ano_virgencia",date("Y"));
        $result = $this->db->get($this->table)->result();
        
        if($result){
            
            foreach ($result as $value){
                if($value->valor_inicial <= $valor && $value->valor_final >= $valor){
                    return $value->aliquota;
                }else if($value->valor_inicial <= $valor && $value->valor_final <= $valor && $value->valor_final == "0"){
                    return $value->aliquota;
                }
            }
            //return $result->aliquota;
            
        }else{
            return false;
        }
        
    }
    
}

