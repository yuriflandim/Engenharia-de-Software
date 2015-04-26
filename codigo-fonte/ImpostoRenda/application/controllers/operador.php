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
        $this->load->view("template/header");
        $this->load->view("pages/operador/novo");
        $this->load->view("template/footer");
    }
    
        
    public function editar($id = null){
                
        if(!is_null($id)){
            $this->load->view("template/header");
            $this->load->view("pages/operador/editar", array("result" => $this->operador->getById($id)));
            $this->load->view("template/footer");
        }else{
            redirect(base_url("operador"));
        }
        
    }
    
    // Process
    
    
    public function newProcess(){
        
        $datas = array( 
            // key => value
        );
        
        $responseOperador = $this->operador->add($this->input->post->$operador);
        $responseEndereco = $this->endereco->add($this->input->post->$endereco);
        
        if($responseOperador && $responseEndereco){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Operador cadastrado com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao cadastar novo operador."));
        }
        
    }
    
    public function editProcess(){
        
        $datas = array( 
            //
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
