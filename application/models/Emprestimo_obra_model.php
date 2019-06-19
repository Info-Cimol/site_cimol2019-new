<?php
class Emprestimo_obra_model extends CI_Model{
	
	public function emprestimo_obra($data){

		/*
		//$this->db->insert('armario_aluno', $data);
		$this->db->select('count(e.registro) as emprestimo')
		->from('coord_emprestimo_obra e')
		->where('e.registro=', $data['registro'])
		->where('e.data_entrega=', null;
		$query=$this->db->get();
		$resultado=$query->result();

		if ($resultado[0]->emprestimo > 0) {
			// O livro ja esta emprestado
			echo "string";
		}
		*/

		/*
		$this->db->select('p.nome, al.id')
		->from('pessoa p')
		->join('aluno al','al.pessoa_id=p.id')
		->join('aluno_turma at','al.id=at.aluno_id')
		->join('turma t','at.turma_id=t.id')
		->where('t.segmento_curso_curso_id=', $curso);
		$this->db->order_by('p.nome');
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;//
	*/



		//Verificar se já existe livro emprestado com o mesmo registro
		$this->db->insert('coord_emprestimo_obra', $data);
		return true;

	}


	public function busca_aluno($aluno){

		$this->db->select('p.nome, al.id')
		->from('pessoa p')
		->join('aluno al','al.pessoa_id=p.id');
		//->join('aluno_turma at','al.id=at.aluno_id')
		//->join('turma t','at.turma_id=t.id');
		//->where('t.segmento_curso_curso_id=', $curso);
		//->where('p.nome=', $aluno);
		//$this->db->like('p.nome', $aluno);
		$this->db->or_like('p.nome', $aluno);
		$this->db->order_by('p.nome');
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
	}

	public function busca_emprestimo_obra(){


		$this->db->select('e.id, e.curso, e.registro, e.obra, e.data_emprestimo, e.data_devolucao, p.nome')
		->from('coord_emprestimo_obra e')
		->join('aluno al', 'al.id=e.aluno_id')
		->join('pessoa p', 'al.pessoa_id=p.id')
		->where('e.data_entrega=', null)
		->where('e.data_devolucao>', date('Y-m-d'));
		$this->db->order_by('e.data_emprestimo DESC'); 
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado;
	}

	public function busca_emprestimo_obra_vencido(){

		$this->db->select('e.id, e.curso, e.registro, e.obra, e.data_emprestimo, e.data_devolucao, p.nome')
		->from('coord_emprestimo_obra e')
		->join('aluno al', 'al.id=e.aluno_id')
		->join('pessoa p', 'al.pessoa_id=p.id')	
		->where('e.data_devolucao<', date('Y-m-d'))
		->where('e.data_entrega=', null);
		$this->db->order_by('e.data_emprestimo'); 
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado;	
	}

	public function devolucao_emprestimo_obra($data){

		//$this->db->set('data_entrega', $data['data_entrega'])
		$this->db->set('data_entrega', date('Y-m-d'))

		->where('coord_emprestimo_obra.id=', $data)
		->update('coord_emprestimo_obra');
		return true;
	}

	public function renovar_emprestimo_obra($data){

		$data_atual = date('Y-m-d');
		$data_renovacao = date('Y-m-d', strtotime($data_atual . ' + 15 days'));
		//$this->db->set('data_entrega', null)
		$this->db->set('data_devolucao', $data_renovacao)

		->where('coord_emprestimo_obra.id=', $data)
		->update('coord_emprestimo_obra');
		return $data_renovacao;
	}


	public function quantidade_emprestados(){

		$this->db->select('count(e.registro) as emprestados, count(e.registro) as vencidos')
		->from('coord_emprestimo_obra e')	
		->where('e.data_devolucao<', date('Y-m-d'))
		->where('e.data_entrega=', null);
		$this->db->order_by('e.data_emprestimo'); 
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado;
	}





}