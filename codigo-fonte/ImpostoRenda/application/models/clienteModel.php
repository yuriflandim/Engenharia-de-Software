<?php

class ClienteModel extends CI_Model{
    
    private $table = "cliente";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getById($id){
        $this->db->where("id",$id);
        $result = $this->db->get($this->table)->row();
        return $result;
    }
    
    public function getName($id){
        $this->db->select("nome");
        $this->db->where("id",$id);
        $result = $this->db->get($this->table)->row();
        
        if($result){
            return $result->nome;
        }
        
        return false;
    }

    public function getByIdWithAdrress($id) {
        $this->db->select($this->table . ".*,e.logradouro,e.bairro,e.cep,e.numero,e.id_cidade,city.id_estado");
        $this->db->join("endereco e", "e.id = " . $this->table . ".id_endereco", "left");
        $this->db->join("cidade city", "city.id = e.id_cidade", "left");
        $this->db->where($this->table . ".id", $id);
        return $this->db->get($this->table)->row();
    }

    public function listAll() {
        return $this->db->get($this->table)->result();
    }
    
    public function add($datas) {

        $this->db->trans_begin();

        $endereco = new EnderecoModel();
        $idEndereco = $endereco->add($datas['endereco']);
        
        $this->db->query("INSERT INTO cliente(nome,email,cpf,rg,fone,quantidade_dependentes,id_endereco)VALUES('{$datas['cliente']['nome']}','{$datas['cliente']['email']}','{$datas['cliente']['cpf']}','{$datas['cliente']['rg']}','{$datas['cliente']['telefone']}','{$datas['cliente']['quantidade_dependentes']}','{$idEndereco}')");

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return true;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    
    public function updateUser($name,$email){
        $this->db->set("name",$name);
        $this->db->set("email",$email);
        $this->db->insert($this->table);
    }
    
    public function edit($id, $datas) {

        $this->db->trans_begin();

        $this->db->query("UPDATE endereco SET logradouro = '{$datas['endereco']['logradouro']}',numero = '{$datas['endereco']['numero']}',bairro = '{$datas['endereco']['bairro']}',cep = '{$datas['endereco']['cep']}',id_cidade = '{$datas['endereco']['id_cidade']}' WHERE id = '{$datas['endereco']['id']}'");
        $this->db->query("UPDATE cliente SET nome = '{$datas['cliente']['nome']}',email = '{$datas['cliente']['email']}',cpf = '{$datas['cliente']['cpf']}',rg = '{$datas['cliente']['rg']}',fone = '{$datas['cliente']['telefone']}',quantidade_dependentes = '{$datas['cliente']['quantidade_dependentes']}' WHERE id = '{$id}'");

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return true;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function delete($id) {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }
    
}