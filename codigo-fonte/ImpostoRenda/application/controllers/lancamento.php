<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lancamento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("lancamentoModel","lancamento");
    }

    public function index(){
        
        $datas['result'] = $this->lancamento->lastInsert();
        
        $this->load->view("template/header");
        $this->load->view("pages/lancamento/listagem", $datas);
        $this->load->view("template/footer");
        
    }
    
    public function novo(){
        
        $this->load->model("clienteModel","cliente");
        $datas['clientes'] = $this->cliente->listAll();
        
        $this->load->view("template/header");
        $this->load->view("pages/lancamento/novo",$datas);
        $this->load->view("template/footer");
    }
    
    public function newProcess(){
        
        $data = array(
            "cliente" => $this->input->post("cliente"),
            "valor" => str_replace(",",".",str_replace(".","",$this->input->post("valor")))
        );
        
        $response = $this->lancamento->add($data);
        
        if($response){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Lançamento cadastrado com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao fazer novo lançamento."));
        }
    }
    
}
