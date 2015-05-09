<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class WebService extends CI_Controller{
        
        public function __construct() {
            parent::__construct();
            $this->load->model("webServiceModel");
        }
        
        public function index() {}

        // Retorna cidades de um deterninado estado
        public function getCitys($state){
            $list = $this->webServiceModel->getAllCitysOfState($state);
            echo json_encode($list);
        }
        
        // Retorna os estados do brasil
        public function getStates(){
            $list = $this->webServiceModel->getStates();
            echo json_encode($list);
        }
        
    }
?>