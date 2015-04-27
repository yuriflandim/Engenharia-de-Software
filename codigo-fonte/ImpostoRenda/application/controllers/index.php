<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("operadorModel", "operador");
    }

    public function index() {
        $this->load->view("pages/login");
    }

    public function acessar() {

        $datas = array(
            "email" => $this->input->post("login_email"),
            "senha" => $this->input->post("login_senha"),
        );

        $response = $this->operador->getByEmail($datas["email"]);
        if ($response) {

            if ($datas["senha"] === $response->senha) {
                echo json_encode(array("status" => "success"));
            } else {
                echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Dados incorretos."));
            }
        } else {
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Usuário não cadastrado."));
        }
    }

    public function home() {
        $this->load->view("template/header");
        $this->load->view("pages/home");
        $this->load->view("template/footer");
    }

}
