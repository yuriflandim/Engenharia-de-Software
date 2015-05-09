<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Operador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("operadorModel", "operador");
        $this->load->model("enderecoModel", "endereco");
    }

    public function index(){
        $this->load->view("template/header");
        $this->load->view("pages/operador/listagem", array("list" => $this->operador->listAll()));
        $this->load->view("template/footer");
    }
    
    public function novo(){
        
        $this->load->model("webServiceModel");
        $datas['estados'] = $this->webServiceModel->getStates();
            
        $this->load->view("template/header");
        $this->load->view("pages/operador/novo",$datas);
        $this->load->view("template/footer");
    }
    
        
    public function editar($id = null){
                
        if(!is_null($id)){
            
            $result = $this->operador->getByIdWithAdrress($id);
            
            if(!is_null($result)){
                
                $this->load->model("webServiceModel");
                $datas['estados'] = $this->webServiceModel->getStates();
                $datas['listaCidades'] = $this->webServiceModel->getAllCitysOfState($result->id_estado);
                $datas['result'] = $result;
                                
                $this->load->view("template/header");
                $this->load->view("pages/operador/editar", $datas);
                $this->load->view("template/footer");
            }else{
                redirect(base_url("operador"));
            }
            
        }else{
            redirect(base_url("operador"));
        }
        
    }
    
    // Process 
    public function newProcess(){
        
        $datas = array( 
            "endereco" => $this->input->post("endereco"),
            "operador" => $this->input->post("operador"),
        );
        
        $responseOperador = $this->operador->add($datas);
        
        if($responseOperador){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Operador cadastrado com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao cadastar novo operador."));
        }
        
    }
    
    public function editProcess(){
        
        $datas = array( 
            "endereco" => $this->input->post("endereco"),
            "operador" => $this->input->post("operador"),
        );

        $response = $this->operador->edit($this->input->post("id"), $datas);

        if($response){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Atualização efetuada com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao tentar atualizar registros."));
        }
        
    }
    
    public function deleteProcess($id){
        
        $response = $this->operador->delete($id);

        if($response){
            echo json_encode(array("status" => "success", "message" => "Operador deletada com sucesso"));
        }else{
            echo json_encode(array("status" => "error", "message" => "Ocorreu um problema ao deletar este operador"));
        }
    }
    
}
