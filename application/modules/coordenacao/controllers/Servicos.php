<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends MX_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('armario_model');
			//$this->view->setTema("coordena");
		if(isset($this->user_data)){
			if(
				!in_array('coordenador_curso', $this->user_data['permissoes']) 
			){
				redirect('coordenacao/restrito', 'refresh');	
			}
		}else{	
			redirect('restrito', 'refresh');
		}
	}

	// Método que carrega a párina inicial "armário/index" onde são mostrados todos os armários
	public function index(){

		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content'] = "servicos/index";
		$this->view->show_view($this->data);
		
	}



}
