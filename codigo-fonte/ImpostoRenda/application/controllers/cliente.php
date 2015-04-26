<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->view("template/header");
        $this->load->view("pages/cliente/listagem");
        $this->load->view("template/footer");
    }
    
    public function novo(){
        $this->load->view("template/header");
        $this->load->view("pages/cliente/novo");
        $this->load->view("template/footer");
    }
    
}
