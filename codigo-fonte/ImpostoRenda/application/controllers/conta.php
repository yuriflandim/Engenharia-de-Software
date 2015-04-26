<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model("userModel","user");
    }

    public function index() {}

    public function login() {
        $this->load->view("login");
    }
    
    public function logout(){}
    
    public function loginProcess() {
        
    }
    
    
}
