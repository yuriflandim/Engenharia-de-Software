<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lancamento extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->view("template/header");
        $this->load->view("pages/lancamento/listagem");
        $this->load->view("template/footer");
    }
    
    public function novo(){
        $this->load->view("template/header");
        $this->load->view("pages/lancamento/novo");
        $this->load->view("template/footer");
    }
    
}
