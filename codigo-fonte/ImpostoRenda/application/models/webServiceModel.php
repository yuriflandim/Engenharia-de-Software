<?php

    class WebServiceModel extends CI_Model{
        
        public function __construct() {
            parent::__construct();
        }
        
        /*
         *  Retorna as cidades de um determinado estado
         */
        public function getAllCitysOfState($id_state){
            $this->db->select("*");
            $this->db->where("id_estado", $id_state);
            $this->db->from("cidade");
            
            return $this->db->get()->result();
        }
        
        /*
         * Retorna uma lista com todos os estados do Brasil
         */
        public function getStates(){
            $this->db->select("*");
            $this->db->from("estado");
            return $this->db->get()->result();
        }
        
    }

?>
