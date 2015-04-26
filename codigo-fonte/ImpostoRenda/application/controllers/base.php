<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("baseModel", "base");
    }

    public function index(){
        $this->load->view("template/header");
        $this->load->view("pages/base/listagem", array("list" => $this->base->listAll()));
        $this->load->view("template/footer");
    }
    
    public function novo(){
        $this->load->view("template/header");
        $this->load->view("pages/base/novo");
        $this->load->view("template/footer");
    }
    
    public function editar($id = null){
                
        if(!is_null($id)){
            $this->load->view("template/header");
            $this->load->view("pages/base/editar", array("result" => $this->base->getById($id)));
            $this->load->view("template/footer");
        }else{
            redirect(base_url("base"));
        }
        
    }
    
    // Process
    
    
    public function newProcess(){
        
        $datas = array( 
            "valor_inicial" => str_replace(",",".", str_replace(".","",$this->input->post("valor_inicial"))),
            "valor_final" => str_replace(",",".", str_replace(".","",$this->input->post("valor_final"))),
            "aliquota" => $this->input->post("aliquota"),
            "parcela_deduzir" => str_replace(",",".", str_replace(".","",$this->input->post("deducao")))
        );
        
        $response = $this->base->add($datas);
        
        if($response){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Base cadastrada com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao cadastar nova base."));
        }
        
    }
    
    public function editProcess(){
        
        $datas = array( 
            "valor_inicial" => str_replace(",",".", str_replace(".","",$this->input->post("valor_inicial"))),
            "valor_final" => str_replace(",",".", str_replace(".","",$this->input->post("valor_final"))),
            "parcela_deduzir" => str_replace(",",".", str_replace(".","",$this->input->post("deducao")))
        );

        $response = $this->base->edit($this->input->post("id"), $datas);

        if($response){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Atualização efetuada com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao tentar atualizar registros."));
        }
        
    }
    
    public function deleteProcess($id){
        
        $response = $this->base->delete($id);

        if($response){
            echo json_encode(array("status" => "success", "message" => "Base deletada com sucesso"));
        }else{
            echo json_encode(array("status" => "error", "message" => "Ocorreu um problema ao deletar esta base"));
        }
    }
    
}
