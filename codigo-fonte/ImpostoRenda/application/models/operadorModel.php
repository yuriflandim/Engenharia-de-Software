<?php

class OperadorModel extends CI_Model {

    private $table = "operador";

    public function __construct() {
        parent::__construct();
    }

    public function listAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($id) {
        $this->db->where("id", $id);
        $result = $this->db->get($this->table)->row();
        return $result;
    }

    public function getByIdWithAdrress($id) {
        $this->db->select($this->table . ".*,e.logradouro,e.bairro,e.cep,e.numero,e.id_cidade,city.id_estado");
        $this->db->join("endereco e", "e.id = " . $this->table . ".id_endereco", "left");
        $this->db->join("cidade city", "city.id = e.id_cidade", "left");
        $this->db->where($this->table . ".id", $id);
        return $this->db->get($this->table)->row();
    }

    public function getByEmail($email) {
        $this->db->where("email", $email);
        $result = $this->db->get($this->table)->row();
        return $result;
    }

    public function add($datas) {

        $this->db->trans_begin();

        $endereco = new EnderecoModel();
        $idEndereco = $endereco->add($datas['endereco']);
        
        $this->db->query("INSERT INTO operador(nome,email,cpf,fone,senha,permissao,dt_cadastro,id_endereco)VALUES('{$datas['operador']['nome']}','{$datas['operador']['email']}','{$datas['operador']['cpf']}','{$datas['operador']['telefone']}','{$datas['operador']['senha']}','{$datas['operador']['permissao']}','" . date("Y-m-d") . "','{$idEndereco}')");

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return true;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function edit($id, $datas) {

        $this->db->trans_begin();

        $this->db->query("UPDATE endereco SET logradouro = '{$datas['endereco']['logradouro']}',numero = '{$datas['endereco']['numero']}',bairro = '{$datas['endereco']['bairro']}',cep = '{$datas['endereco']['cep']}',id_cidade = '{$datas['endereco']['id_cidade']}' WHERE id = '{$datas['endereco']['id']}'");
        $this->db->query("UPDATE operador SET nome = '{$datas['operador']['nome']}',email = '{$datas['operador']['email']}',cpf = '{$datas['operador']['cpf']}',fone = '{$datas['operador']['telefone']}',senha = '{$datas['operador']['senha']}',permissao = '{$datas['operador']['permissao']}' WHERE id = '{$id}'");

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
