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
    
    public function getDeducao($valor){
        
        $this->db->select("id_base,parcela_deduzir");
        $this->db->where("ano_virgencia",date("Y"));
        $this->db->where("valor_final >=",$valor);
        $this->db->where("valor_inicial <=",$valor);
        $result = $this->db->get($this->table)->row();
        
        if($result){
            return $result->parcela_deduzir;
        }else{
            return false;
        }
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
    
    public function getDatasByValue($valor){
        $this->db->select("*");
        $this->db->where("ano_virgencia",date("Y"));
        $result = $this->db->get($this->table)->result();
        
        if($result){
            
            foreach ($result as $value){
                if($value->valor_inicial <= $valor && $value->valor_final >= $valor){
                    return $value;
                }else if($value->valor_inicial <= $valor && $value->valor_final <= $valor && $value->valor_final == "0"){
                    return $value;
                }
            }
            
        }else{
            return false;
        }
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

