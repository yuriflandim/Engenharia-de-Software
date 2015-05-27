<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inss extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("inssModel", "base");
    }

    public function index(){
        $this->load->view("template/header");
        $this->load->view("pages/inss/listagem", array("list" => $this->inss->listAll()));
        $this->load->view("template/footer");
    }
    
    public function novo(){
        $this->load->view("template/header");
        $this->load->view("pages/inss/novo");
        $this->load->view("template/footer");
    }
    
    public function editar($id = null){
                
        if(!is_null($id)){
            $this->load->view("template/header");
            $this->load->view("pages/inss/editar", array("result" => $this->inss->getById($id)));
            $this->load->view("template/footer");
        }else{
            redirect(base_url("base"));
        }
        
    }
    
    // Process
    
    public function filter($ano = null){
        if(!is_null($ano)){
            echo json_encode($this->inss->listAll($ano));
        }else{
            echo false;
        }
    }
    
}
