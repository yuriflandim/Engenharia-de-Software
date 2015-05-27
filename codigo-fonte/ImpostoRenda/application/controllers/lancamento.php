<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lancamento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("lancamentoModel","lancamento");
    }

    public function index(){
        
        $datas['result'] = $this->lancamento->lastInsert();
        
        $this->load->view("template/header");
        $this->load->view("pages/lancamento/listagem", $datas);
        $this->load->view("template/footer");
        
    }
    
    public function novo(){
        
        $this->load->model("clienteModel","cliente");
        $datas['clientes'] = $this->cliente->listAll();
        
        $this->load->view("template/header");
        $this->load->view("pages/lancamento/novo",$datas);
        $this->load->view("template/footer");
    }
    
    public function newProcess(){
        
        $datasImposto = $this->calculaImposto();
        
        $data = array(
            "id_cliente" => $this->input->post("cliente"),
            "valor_lancamento" => str_replace(",",".",str_replace(".","",$this->input->post("valor"))),
            "pensao_alimenticia" => str_replace(",",".",str_replace(".","",$this->input->post("pensao_alimenticia"))),
            "id_base" => $datasImposto->id_base,
            "valor_inss" => $datasImposto->inss,
            "valor_imposto" => $datasImposto->imposto,
            "data" => date("Y-m-d H:i:s")
        );
        
        $response = $this->lancamento->add($data);
        
        if($response){
            echo json_encode(array("status" => "success", "title" => "Sucesso", "message" => "Lançamento cadastrado com sucesso."));
        }else{
            echo json_encode(array("status" => "error", "title" => "Oops", "message" => "Ocorreu um erro ao fazer novo lançamento."));
        }
    }
    
    private function calculaImposto(){
        
        // Loader's
        $this->load->model("clienteModel","cliente");
        $this->load->model("baseModel","base");
        $this->load->model("inssModel","inss");
        $this->load->model("dependenteModel","dependente");
        
        $valor_lancamento = str_replace(",",".",str_replace(".","",$this->input->post("valor")));
        $pensao_alimenticia = str_replace(",",".",str_replace(".","",$this->input->post("pensao_alimenticia")));
        $objCliente = $this->cliente->getById($this->input->post("cliente"));
        
        // Aliquota INSS
        $aliquota_inss = $this->inss->getAliquota($valor_lancamento);
        $valor_inss = $aliquota_inss !== false ? ($aliquota_inss/100) * $valor_lancamento : 0;
        
        // Soma deduções
        $deducao = 0;
        $deducao += $valor_inss;
        $deducao += $objCliente->quantidade_dependentes > 0 ? $this->dependente->getValor($objCliente->quantidade_dependentes) : 0;
        $deducao += $pensao_alimenticia;
        
        // ===== Calculando valor final. Imposto à pagar ====
        // Valor do lançamento retirando as deduções
        $valor_com_deducoes = $valor_lancamento - $deducao;
        
        $datas_base = $this->base->getDatasByValue($valor_com_deducoes);
        
        // Recuperando o valor da dedução da base
        $deducao_imposto = $datas_base->parcela_deduzir;
        
        $valor_imposto = ($valor_com_deducoes * ($datas_base->aliquota/100)) - $deducao_imposto;
        
        return (object)array("inss" => $valor_inss, "imposto" => $valor_imposto, "id_base" => $datas_base->id);
                
    }
    
}
