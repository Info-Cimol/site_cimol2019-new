<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patrimonio  extends MX_Controller {
	

	public function index(){
		$this->load->model("Patrimonio_model");
		$this->data['content']="patrimonio/index";
		$this->view->show_view($this->data);     
  
	}
	public function cadastro_patrimonio() {
   
    //$this->load->view("template",$dados);
     $this->data['content']="patrimonio/cadastro_patrimonio"; 
      $this->view->show_view($this->data); 

    
}
public function salvar(){
    $this->load->model("Patrimonio_model");
    $this->model_patrimonios->salvar();
    redirect('coordenacao/patrimonio');
    
       
    
}
public function lista_patrimonio() {
   
    //$this->load->view("template",$dados);
     $this->data['content']="patrimonio/lista_patrimonio"; 
      $this->view->show_view($this->data); 

}
}
