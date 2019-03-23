<?php
class Servico_model extends CI_Model{
	
	public function abrir_chamado($dados){

		// Conta se já existe algum chamado em ABERTO com o código passado. Se abrir um chamado sem código não entra não IF.
		if ($dados['codigo'] != '') {
			
			$this->db->select('count(codigo) as codigo')
			->from('serv_equipamento e')
			->join('serv_chamado c','e.id=c.id_equipamento')
			//->where('e.id=', 'c.id_equipamento')
			->where('e.codigo=', $dados['codigo'])
			->where('c.status!=', 'Finalizado');
			$query=$this->db->get();
			$resultado=$query->result();

			if ($resultado[0]->codigo > 0) {
				return $resultado;
			}
		}

		// Conta se já existe algum chamado em ABERTO com o Número de série passado. Se abrir um chamado sem número de série não entra não IF.
		if ($dados['num_serie'] != '') {
			
			$this->db->select('count(num_serie) as num_serie')
			->from('serv_equipamento e')
			->join('serv_chamado c','e.id=c.id_equipamento')
			//->where('e.id=', 'c.id_equipamento')
			->where('e.num_serie=', $dados['num_serie'])
			->where('c.status!=', 'Finalizado');
			$query=$this->db->get();
			$resultado=$query->result();
			
			if ($resultado[0]->num_serie > 0) {
				return $resultado;
			}
		}
		
		
		

		
		//if (($dados['codigo_equipamento'] != '') || ($resultado[0]->codigo == 0)) {

			$dados_equipamento = array(
				'codigo' => $dados['codigo'],
				'num_serie' => $dados['num_serie'],
				'nome' => $dados['nome'],
			);
				
			$this->db->insert('serv_equipamento', $dados_equipamento);
			$id_equipamento = $this->db->insert_id();

			$dados_chamado = array(
				//'codigo_equipamento' => $dados['codigo_equipamento'],
				'id_equipamento' => $id_equipamento,
				'status' => 'pendente',
				'data_abertura' => date('Y-m-d'),
				'defeito' => $dados['defeito'],
			);

			$this->db->insert('serv_chamado', $dados_chamado);
				
		
		
			return true;
		//}

		/*
		if ($resultado[0]->codigo != 0) {
			return $resultado[0]->codigo;
		}
		*/
		
		
		/*
		if ($resultado[0]->codigo == 0) {
			
			$dados_chamado = array(
				'codigo_equipamento' => $dados['codigo_equipamento'],
				'id_equipamento' => $dados['id_equipamento'],
				'status' => 'pendente',
				'data_abertura' => date('Y-m-d'),
				'defeito' => $dados['defeito'],
			);

			$this->db->insert('serv_chamado', $dados_chamado);
				
			$dados_equipamento = array(
				'codigo' => $dados['codigo_equipamento'],
				'num_serie' => $dados['num_serie'],
				'nome' => $dados['nome'],
				'descricao' => $dados['descricao'],
			);
				
			$this->db->insert('serv_equipamento', $dados_equipamento);

			$teste = "oi";
			return $teste;

		}else{
	
			return 1;
		}
		*/

		//return $resultados[] = $resultado ;

		

		//return true;

	}

	public function busca_chamado(){

		if (isset($dados)) {

			$this->db->select('*')
			->from('serv_chamado c')
			->join('serv_equipamento e','e.codigo=c.codigo_equipamento')
			->where('c.codigo_equipamento=', $dados['codigo_equipamento']);
			//->where('aa.data_entrega=', null);
			$query=$this->db->get();
			$resultado=$query->result();
			return $resultados[] = $resultado ;	
		}else{
			
			$this->db->select('e.*, c.*')
			->from('serv_chamado c')
			->join('serv_equipamento e','e.id=c.id_equipamento')
			//->where('c.equipamento_codigo=', $dados['equipamento_codigo'])
			->where('c.status!=', 'finalizado');
			$this->db->order_by('c.data_abertura');
			$query=$this->db->get();
			$resultado=$query->result();
			return $resultados[] = $resultado ;
		}
					
	}

	public function busca_detalhes_abrir_chamado($codigo){

		$this->db->select('e.*, c.*')
		->from('serv_chamado c')
		->join('serv_equipamento e','e.id=c.id_equipamento')
		->where('e.codigo=', $codigo);
		//->where('aa.data_entrega=', null);
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;

	}

	public function busca_detalhes($id){

		$this->db->select('e.*, c.*')
		->from('serv_chamado c')
		->join('serv_equipamento e','e.id=c.id_equipamento')
		->where('e.id=', $id);
		//->where('aa.data_entrega=', null);
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;

	}

	public function alterar($equipamento_codigo){

		$this->db->set('status', $equipamento_codigo)
		->where('serv_chamado.equipamento_codigo=', 250)
		->update('serv_chamado');

	}

	public function busca_chamado_ajax($status){
			


			if ($status == "Todos") {
				
				$this->db->select('*')
				->from('serv_chamado c')
				->join('serv_equipamento e','e.id=c.id_equipamento');
				//->where('c.equipamento_codigo=', $dados['equipamento_codigo'])
				//->where('c.status!=', '');
				$query=$this->db->get();
				$resultado=$query->result();
				return $resultados[] = $resultado ;
			}

			$this->db->select('*')
			->from('serv_chamado c')
			->join('serv_equipamento e','e.id=c.id_equipamento')
			//->where('c.equipamento_codigo=', $dados['equipamento_codigo'])
			->where('c.status=', $status);
			$query=$this->db->get();
			$resultado=$query->result();
			return $resultados[] = $resultado ;

	}

	public function finalizar_chamado($dados){

		$this->db->set('status', 'Finalizado');
		$this->db->set('data_solucao', $dados['data_solucao']);
		$this->db->set('solucao', $dados['solucao'])
		->where('serv_chamado.equipamento_codigo=', $dados['codigo'])
		->update('serv_chamado');

	}

	public function editar_chamado($dados){

		
		
		if ($dados['data_atendimento'] != '') {
			$this->db->set('data_atendimento', $dados['data_atendimento']);
		}
		if ($dados['data_solucao'] != '') {
			$this->db->set('data_solucao', $dados['data_solucao']);
		}
		$this->db->set('status', $dados['status']);
		$this->db->set('defeito', $dados['defeito']);
		$this->db->set('solucao', $dados['solucao'])

		->where('serv_chamado.id_equipamento=', $dados['id'])
		->update('serv_chamado');
		

		
		// Alterar outra tabela
		$this->db->set('num_serie', $dados['num_serie']);
		$this->db->set('local_id', $dados['local'])

		->where('serv_equipamento.id=', $dados['id'])
		->update('serv_equipamento');

		

		return true;

	}



}