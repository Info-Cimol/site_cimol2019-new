<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimo_obra extends MX_Controller {
	public function __construct(){

		parent::__construct();
		//$this->view->setTema($this->tema);
		$this->load->model('emprestimo_obra_model');
		
		if(isset($this->user_data)){
			//print_r($this->user_data['permissoes']);
			if(
				!in_array('coordenador_curso', $this->user_data['permissoes']) 
			){
				redirect('coordenacao/restrito', 'refresh');
				
			}
		}else{
			
			redirect('restrito', 'refresh');
		}
	}
	
	public function index()
	{
		/*echo $this->config->item("tema");
      print_r($_SERVER['PATH_INFO']);*/
		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content']="emprestimo_obra/index";
		
		$this->view->show_view($this->data);
	}
	
	public function restrito(){
		$this->data['title']="Cimol - Área do Coordenador";
		$this->data['template']="restrito";
		$this->view->show_view($this->data);
	}

	public function emprestimo_obra(){

		$data = array(
			'aluno_id' => $this->input->post('aluno_id'),
			//'curso' => $this->input->post('curso'),
			'registro' => $this->input->post('registro'), 
			'obra' => $this->input->post('obra'),
			'data_emprestimo' => date('Y-m-d'),
			//'data_devolucao' => date('Y-m-d', strtotime($data . ' + 2 days'));,
		);
		$data['data_devolucao'] = date('Y-m-d', strtotime($data['data_emprestimo'] . ' + 14 days'));

		$emprestimo_obra = $this->emprestimo_obra_model->emprestimo_obra($data);
		echo json_encode($emprestimo_obra);

	}

	public function busca_aluno(){

		$aluno = $this->input->post('aluno');
		$resultado = $this->emprestimo_obra_model->busca_aluno($aluno);
		
		echo json_encode($resultado);
	}


	public function busca_emprestimo(){

		$emprestimo['locados'] = $this->emprestimo_obra_model->busca_emprestimo_obra();
		$emprestimo['vencidos'] = $this->emprestimo_obra_model->busca_emprestimo_obra_vencido();
		$emprestimo['quantidade'] = $this->emprestimo_obra_model->quantidade_emprestados();

		echo json_encode($emprestimo);
		//print_r($emprestimo);
	}

	public function busca_emprestimo_vencido(){

		$vencidos = $this->emprestimo_obra_model->busca_emprestimo_obra_vencido();
		echo json_encode($vencidos);
	}

	public function renovar_emprestimo_obra(){
		$renovar = $this->emprestimo_obra_model->renovar_emprestimo_obra($this->input->post('id'));
		echo json_encode($renovar);	
	}

	public function devolucao_emprestimo_obra(){
		$devolucao = $this->emprestimo_obra_model->devolucao_emprestimo_obra($this->input->post('id'));
		echo json_encode($devolucao);	
	}
	
	
}
