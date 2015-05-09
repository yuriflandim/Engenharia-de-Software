<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("clienteModel", "cliente");
        $this->load->model("enderecoModel", "endereco");
    }

    public function index(){
        $this->load->view("template/header");
        $this->load->view("pages/cliente/listagem",array("list" => $this->cliente->listAll()));
        $this->load->view("template/footer");
    }
    
    public function novo(){
        
        $this->load->model("webServiceModel");
        $datas['estados'] = $this->webServiceModel->getStates();
            
        $this->load->view("template/header");
        $this->load->view("pages/cliente/novo", $datas);
        $this->load->view("template/footer");
    }
    
    public function historico($id_cliente = null){
        
        if(!is_null($id_cliente)){
            $this->load->model("lancamentoModel", "lancamento");
            $datas["result"] = $this->lancamento->getByClient($id_cliente);
            $datas["clientName"] = $this->cliente->getName($id_cliente);

            $this->load->view("template/header");
            $this->load->view("pages/cliente/historico", $datas);
            $this->load->view("template/footer");
        }else{
            redirect(base_url("cliente"));
        }
        
    }
    
    public function editar($id = null){
                
        if(!is_null($id)){
            
            $result = $this->cliente->getByIdWithAdrress($id);
            
            if(!is_null($result)){
                
                $this->load->model("webServiceModel");
                $datas['estados'] = $this->webServiceModel->getStates();
                $datas['listaCidades'] = $this->webServiceModel->getAllCitysOfState($result->id_estado);
                $datas['result'] = $result;
                                
                $this->load->view("template/header");
                $this->load->view("pages/cliente/editar", $datas);
                $this->load->view("template/footer");
            }else{
                redirect(base_url("cliente"));
            }
            
        }else{
            redirect(base_url("cliente"));
        }
        
    }
    
    // Process
    public function newProcess(){
        
        $datas = array( 
            "endereco" => $this->input->post("endereco"),
            "cliente" => $this->input->post("cliente"),
        );
        
        $responseCliente = $this->cliente->add($datas);
        
        if($responseCliente){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Cliente cadastrado com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao cadastar novo cliente."));
        }
        
    }
    
    public function editProcess(){
        
        $datas = array( 
            "endereco" => $this->input->post("endereco"),
            "cliente" => $this->input->post("cliente"),
        );

        $response = $this->cliente->edit($this->input->post("id"), $datas);

        if($response){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Atualização efetuada com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao tentar atualizar registros."));
        }
        
    }
    
    public function deleteProcess($id){
        
        $response = $this->cliente->delete($id);

        if($response){
            echo json_encode(array("status" => "success", "message" => "Cliente deletada com sucesso"));
        }else{
            echo json_encode(array("status" => "error", "message" => "Ocorreu um problema ao deletar este cliente"));
        }
    }
    
}
