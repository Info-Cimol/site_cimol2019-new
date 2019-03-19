<?php
class Servico_model extends CI_Model{
	
	public function abrir_chamado($dados){

		$dados_chamado = array(
			'equipamento_codigo' => $dados['equipamento_codigo'],
			'status' => 'pendente',
			'data_abertura' => date('Y-m-d'),
			'defeito' => $dados['defeito'],
		);

		$this->db->insert('serv_chamado', $dados_chamado);
		
		$dados_equipamento = array(
			'codigo' => $dados['equipamento_codigo'],
			'num_serie' => $dados['num_serie'],
			'nome' => $dados['nome'],
			'descricao' => $dados['descricao'],
		);
		
		$this->db->insert('serv_equipamento', $dados_equipamento);

		return true;

		/*
		$this->db->select('p.nome, al.id')
		->from('pessoa p')
		->join('aluno al','al.pessoa_id=p.id')
		->join('aluno_turma at','al.id=at.aluno_id')
		->join('turma t','at.turma_id=t.id')
		->join('armario_aluno aa','al.id=aa.aluno_id')
		//->join('usuario u','al.pessoa_id=u.id')
		//->join('pessoa p','u.pessoa_id=p.id')	
		//->join('curso c','c.id=u.usuario_id');	
		//->where('al.id=p.id');
		//->where('t.segmento_curso_curso_id=', $curso)
		->where('aa.armario_id=', $armario_id)
		->where('aa.data_entrega=', null);
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
	*/

	}

	public function busca_chamado(){

		if (isset($dados)) {

			$this->db->select('*')
			->from('serv_chamado c')
			->join('serv_equipamento e','e.codigo=c.equipamento_codigo')
			->where('c.equipamento_codigo=', $dados['equipamento_codigo']);
			//->where('aa.data_entrega=', null);
			$query=$this->db->get();
			$resultado=$query->result();
			return $resultados[] = $resultado ;	
		}else{
			
			$this->db->select('e.*, c.*')
			->from('serv_chamado c')
			->join('serv_equipamento e','e.codigo=c.equipamento_codigo')
			//->where('c.equipamento_codigo=', $dados['equipamento_codigo'])
			->where('c.status!=', 'finalizado');
			$this->db->order_by('c.data_abertura');
			$query=$this->db->get();
			$resultado=$query->result();
			return $resultados[] = $resultado ;
		}
					
	}

	public function busca_detalhes($equipamento_codigo){

		$this->db->select('e.*, c.*')
		->from('serv_chamado c')
		->join('serv_equipamento e','e.codigo=c.equipamento_codigo')
		->where('c.equipamento_codigo=', $equipamento_codigo);
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
				->join('serv_equipamento e','e.codigo=c.equipamento_codigo');
				//->where('c.equipamento_codigo=', $dados['equipamento_codigo'])
				//->where('c.status!=', '');
				$query=$this->db->get();
				$resultado=$query->result();
				return $resultados[] = $resultado ;
			}

						$this->db->select('*')
			->from('serv_chamado c')
			->join('serv_equipamento e','e.codigo=c.equipamento_codigo')
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


}