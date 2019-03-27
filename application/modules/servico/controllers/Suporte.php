<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suporte extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('servico_model');
		//$this->load->model('serv_chamado');
		//$this->load->model('serv_local');
			//$this->view->setTema("coordena");
		if(isset($this->user_data)){
			if(
				!in_array('coordenador_curso', $this->user_data['permissoes']) 
			){
				redirect('servico/restrito', 'refresh');	
			}
		}else{	
			redirect('restrito', 'refresh');
		}
	}

	// Método que carrega a párina inicial "armário/index" onde são mostrados todos os armários
	public function index(){

		$this->data['chamados'] = $this->servico_model->busca_chamado();

		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content'] = "suporte/index";
		$this->view->show_view($this->data);
		
	}

	/*
	public function finalizar_chamado(){

		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content'] = "servico/finalizar_chamado";
		$this->view->show_view($this->data);
		
	}
	*/

	public function abrir_chamado(){

		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content'] = "suporte/abrir_chamado";
		$this->view->show_view($this->data);
		
	}

	public function abrir_chamado_submit(){
		
		$dados = array(
			'codigo' => $this->input->post('codigo'),
			'id_equipamento' => 3,
			'num_serie' => $this->input->post('num_serie'),
			'nome' => $this->input->post('equipamento'),
			//'descricao' => $this->input->post('descricao'),
			'status' => 'pendente',
			'data_abertura' => date('Y-m-d'),
			'defeito' => $this->input->post('defeito'), 
		);

		$chamado = $this->servico_model->abrir_chamado($dados);

		echo json_encode($chamado);

		/*
		if ($this->data['chamado'] == true) {
			$teste = "já tem";
			echo json_encode($teste);
			return;
		}else{
			$teste2 = "Nao tem";
			echo json_encode($teste2);
			return;
		}

		if (isset($abrir)) {

			$this->data['title']="Cimol - Área de coordenação";
			$this->data['content'] = "servico/index";
			$this->view->show_view($this->data);
		}else{
			echo "string";
		}
		*/

	}

	// Filtra os chamados por STATUS
	public function busca_chamado_ajax(){

		$status = $this->input->post('status');
		$dados = $this->servico_model->busca_chamado_ajax($status);

		echo json_encode($dados);
	}

	public function busca_detalhes_abrir_chamado(){

		$dados = $this->servico_model->busca_detalhes_abrir_chamado($this->input->post('codigo'));
		echo json_encode($dados);

	}

	public function busca_detalhes(){

		$dados = $this->servico_model->busca_detalhes($this->input->post('id'));
		echo json_encode($dados);

	}

	public function alterar($teste){

		$this->servico_model->alterar($teste);
		
	}

	public function finalizar_chamado_submit(){

		$dados = array(
			'codigo' => $this->input->post('codigo'),
			'data_solucao' => $this->input->post('data_solucao'),
			'solucao' => $this->input->post('solucao'), 
		);

		$this->servico_model->finalizar_chamado($dados);
		$this->index();

	}

	public function editar_chamado(){

		$dados = array(
			//'codigo' => $this->input->post('codigo'),
			'id' => $this->input->post('id'),
			//'num_serie' => $this->input->post('num_serie'),
			'status' => $this->input->post('status'),
			'data_atendimento' => $this->input->post('data_atendimento'),
			'data_solucao' => $this->input->post('data_solucao'),
			'defeito' => $this->input->post('defeito'),
			'solucao' => $this->input->post('solucao'),
			'num_serie' => $this->input->post('num_serie'),
			'local' => $this->input->post('local'),
			//'nome' => $this->input->post('equipamento'),
		);

		$editar = $this->servico_model->editar_chamado($dados);

		echo json_encode($editar);

	}



}
