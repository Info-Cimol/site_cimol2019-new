<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Classe responsavel por todas as interações de usuarios com a base de dados.
 */
class Usuario_model extends CI_Model{

	/**
	 * Função responsavel pela autenticação dos usuarios pelo e-mail e senha.
	 * @param $usuario
	 * @param $senha
	 * @return $result
	 */
	function autenticar($usuario, $senha){
        $query="SELECT usuario.id, pessoa.nome,pessoa.rg, pessoa.cpf, 
		count(administrador.pessoa_id) as admin,
		count(aluno.pessoa_id) as aluno,
		count(professor.pessoa_id) as professor,
        count(feintec.pessoa_id) as feintec,
        count(biblioteca.pessoa_id) as biblioteca,
        count(coordenador_curso.professor_id) as coordenador_curso,
		count(pessoa.id) as pessoa from pessoa 
        	LEFT JOIN usuario ON usuario.pessoa_id = pessoa.id 
            LEFT JOIN email ON email.pessoa_id=pessoa.id 
            LEFT JOIN administrador ON administrador.pessoa_id=pessoa.id 
            LEFT JOIN aluno ON aluno.pessoa_id=pessoa.id 
            LEFT JOIN professor ON professor.pessoa_id=pessoa.id 
            LEFT JOIN feintec ON feintec.pessoa_id=pessoa.id 
            LEFT JOIN biblioteca ON biblioteca.pessoa_id=pessoa.id 
            LEFT JOIN coordenador_curso ON coordenador_curso.professor_id=professor.id
            WHERE usuario.senha = '".$senha."' AND email.email = '".$usuario."'
            GROUP BY  usuario.id, pessoa.nome,pessoa.rg, pessoa.cpf";

            echo $query;
       $result = $this->db->query($query); 
       return $result;
	}
	
	/**
	 * Função responsavel por buscar as informações de perfil do usuarios.
	 * @param $id
	* @return $usuario
	 */
	function buscar_perfil($pessoa_id){
		$query="SELECT u.id, p.nome,p.rg, p.cpf,e.email,p.foto, p.id as pessoa_id,
		count(ad.pessoa_id) as admin,
		count(a.pessoa_id) as aluno,
		count(pr.pessoa_id) as professor,
        count(f.pessoa_id) as feintec,
        count(b.pessoa_id) as biblioteca,
        count(cc.professor_id) as coordenador_curso,
		count(p.id) as pessoa from pessoa p
        	LEFT JOIN usuario u ON u.pessoa_id = p.id
            LEFT JOIN email e ON e.pessoa_id=p.id
			LEFT JOIN administrador ad ON ad.pessoa_id=p.id
            LEFT JOIN aluno a ON a.pessoa_id=p.id
            LEFT JOIN professor pr ON pr.pessoa_id=p.id
            LEFT JOIN feintec f ON f.pessoa_id=p.id
            LEFT JOIN biblioteca b ON b.pessoa_id=p.id
            LEFT JOIN coordenador_curso cc ON cc.professor_id=pr.id
            WHERE p.id=".$pessoa_id;
		$usuario = $this->db->query($query);
		$usuario=$usuario->row();
		$this->db->select("*")
		->from('telefone t')
		->where('t.pessoa_id',$usuario->pessoa_id);
		$telefones=$this->db->get();
		$telefones=$telefones->result();
		$usuario->telefones=$telefones;
		//print_r($usuario);
		return $usuario;
	}
	
	/**
	 * Função que verifica se existe um usuario para o email cadastrado.
	 * @param unknown $email
	 * @return boolean
	 */
	function existe_usuario($email){
		$query="SELECT pessoa.*, pessoa.id AS pessoa_id, email.email, count(usuario.id) AS num_reg
				FROM usuario 
				LEFT JOIN pessoa on pessoa.id=usuario.pessoa_id
				LEFT JOIN email on email.pessoa_id=pessoa.id
				WHERE 
				email.email='".$email."'";
		echo $query;
		$result = $this->db->query($query);
		// Se existir um usuario retorna verdadeiro
		if($result->row()->num_reg){
			return $result->row();
		}
		// Se n�o existir um usuario retorna falso
		else{
			return false;
		}
	}

	/**
	 * Fun��o responsavel pelo registro da chave de acesso do usuario
	 * @param unknown $chave_de_acesso
	 * @param unknown $pessoa_id
	 * @return boolean
	 */
	function registra_chave_de_acesso($chave_de_acesso, $pessoa_id){
		//Faz o registro da chave de licen�a e retorna verdadeiro
		if($this->db->set('chave_de_acesso', $chave_de_acesso)
				->where('pessoa_id =', $pessoa_id)
				->update('usuario')){
					return true;
		}
		//Retorna falso se o registro da chave de licen�a n�o foi efetuado.
		else{
			return false;
		}
		
	}

	/**
	 * Função responsavel por buscar se existe a chave de acesso do usuario
	 * @param unknown $chave_de_acesso
	 * @return boolean
	 */
	function buscar_usuario_por_chave_de_acesso($chave_de_acesso){
		//Faz a consulta no banco de dados
		$query="SELECT pessoa.*, pessoa.id AS pessoa_id, email.email, count(usuario.id) AS num_reg
				FROM usuario
				LEFT JOIN pessoa on pessoa.id=usuario.pessoa_id
				LEFT JOIN email on email.pessoa_id=pessoa.id
				WHERE
				usuario.chave_de_acesso='".$chave_de_acesso."'";
		echo $query;
		// Passa o valor da connsulta para uma variavel
		$result = $this->db->query($query);
		if($result->row()->num_reg){
			//Retorna o usuario para a chave de acesso solicitada
			return $result->row();
		}else{
			//Se a chave de acesso n�o existir retorna falso
			return false;
		}
	}

	/**
	 * Função responsavel pela alteração de senha.
	 * @param unknown $chave_de_acesso
	 * @param unknown $email
	 * @param unknown $senha
	 * @return boolean
	 */
	function alterar_senha($chave_de_acesso, $email, $senha){
		$query="UPDATE usuario set senha=".$senha." 
				WHERE chave_de_acesso='".$chave_de_acesso."' 
				AND
				pessoa_id=(SELECT pessoa.id FROM pessoa
				JOIN email ON email.pessoa_id=pessoa.id
				WHERE email.email='".$email."')";
		//retorna que a altera��o foi feita com sucesso
		if($this->db->query($query)){
			return true;
		}
		//retorna que a altera��o n�o foi feita 
		else{
			return false;
		}
	}

	/**
	 * Fun��o responsavel por ativar ou desativar usuarios
	 * @param unknown $status
	 * @param unknown $id
	 * @return boolean
	 */
	function status_usuario($status,$id){
		$query="UPDATE usuario SET status='$status' 
				WHERE pessoa_id='$id'";
		//retorna que a altera��o foi feita com sucesso
		if($this->db->query($query)){
			return true;
		}
		//retorna que a altera��o n�o foi feita 
		else{
			return false;
		}
	}

	function buscarPermissaoAdmin($admin_id){
		$this->db->select("p.*")
		->from("permissao_admin pa")
		->join("permissao p","p.id=pa.permissao_id")
		->where("pa.admin_id",$admin_id);
		$query=$this->db->get();
		return $query->result();
	}

    /**
     * Função responsavel por listar as permissões do usuario.

     * @param unknown $usuario_id
     * @return array - lista de permissões
     */
    function listarPermissoesUsuario($usuario_id){
        $query="SELECT usuario.id, pessoa.nome,pessoa.rg, pessoa.cpf, 
			count(administrador.pessoa_id) as admin,
			count(aluno.pessoa_id) as aluno,
			count(professor.pessoa_id) as professor,
	        count(feintec.pessoa_id) as feintec,
	        count(biblioteca.pessoa_id) as biblioteca,
	        count(coordenador_curso.professor_id) as coordenador_curso,
			count(pessoa.id) as pessoa from pessoa 
	        	LEFT JOIN usuario ON usuario.pessoa_id = pessoa.id 
	            LEFT JOIN email ON email.pessoa_id=pessoa.id 
	            LEFT JOIN administrador ON administrador.pessoa_id=pessoa.id 
	            LEFT JOIN aluno ON aluno.pessoa_id=pessoa.id 
	            LEFT JOIN professor ON professor.pessoa_id=pessoa.id 
	            LEFT JOIN feintec ON feintec.pessoa_id=pessoa.id 
	            LEFT JOIN biblioteca ON biblioteca.pessoa_id=pessoa.id 
	            LEFT JOIN coordenador_curso ON coordenador_curso.professor_id=professor.id
	            WHERE usuario.id =".$usuario_id;
        $query = $this->db->query($query);
        $resultado=$query->result();
        $permissoes=null;
        if($resultado[0]->admin >0){
            $permissoes[]='admin';
        }
        if($resultado[0]->professor>0){
            $permissoes[]='professor';
        }
        if($resultado[0]->aluno>0){
            $permissoes[]='aluno';
        }
        if($resultado[0]->biblioteca>0){
            $permissoes[]='biblioteca';
        }
        if($resultado[0]->coordenador_curso>0){
            $permissoes[]='coordenador';
        }

        return $permissoes;
    }

    function listarPermissoes(){
        return array('admin','professor','aluno','biblioteca','coordenador');
    }

    function listarNiveisPermissaoAdmin(){
        $this->db->select("p.*")
            ->from("permissao p");
        $query=$this->db->get();
        return $query->result();
        //return array('noticia','total','evento','secretaria');
    }

    function buscarNiveisPermissaoAdmin($usuario_id){
        $this->db->select("p.*")
            ->from("usuario u")
            ->join("permissao_admin pa","pa.admin_id=u.pessoa_id")
            ->join("permissao p","p.id=pa.permissao_id")
            ->where("u.id",$usuario_id);
        $query=$this->db->get();
        return $query->result();


    }





	/*/  ------- FUNÇÕES DE USUÁRIO -------  /*/

    function listarUsuarios(){
        $this->db->select("u.id, u.pessoa_id, p.nome, u.status, p.foto")
            ->from('usuario u')
            ->join('pessoa p','p.id = u.pessoa_id');
        $query = $this->db->get();
        $usuarios = $query->result_array();

        $result = array();

        if(count($usuarios)>0){
            foreach ($usuarios as $usuario){

                /*/  email  /*/
                $emails = $this->usuarioEmail($usuario['pessoa_id']);
                $usuario['email'] = $emails;

                /*/  é admin  /*/
                $admin = $this->existeAdmin($usuario['pessoa_id']);
                $usuario['admin'] = $admin;

                /*/  permissoes  /*/
                $permissoes = $this->usuarioPermissoes($usuario['pessoa_id']);
                $permissoes = json_decode(json_encode($permissoes), True);
                $usuario['permissoes'] = $permissoes;

                /*/  servidor  /*/
                $servidor = $this->usuarioServidor($usuario['pessoa_id']);
                $servidor = json_decode(json_encode($servidor), True);
                $usuario['servidor'] = $servidor;

                /*/  é aluno  /*/
                $aluno = $this->usuarioAluno($usuario['pessoa_id']);
                $usuario['aluno'] = $aluno;

                /*/  é professor  /*/
                $professor = $this->usuarioProfessor($usuario['pessoa_id']);
                $usuario['professor'] = $professor;

                array_push($result, $usuario);
            }

        }
        return $result;
    } // Retorna TODOS os usuários

    function buscarUsuario($usuario_id){
        $this->db->select("u.id, p.id as pessoa_id, p.nome, p.rg, p.cpf, u.status ")
            ->from("pessoa p")
            ->join("usuario u","p.id=u.pessoa_id")
            ->where("u.id",$usuario_id);
        $query=$this->db->get();
        $retorno = $query->result();
        $retorno = json_decode(json_encode($retorno), True);
        $retorno = $retorno[0];

        /*/  email  /*/
        $emails = $this->usuarioEmail($retorno['pessoa_id']);
        $retorno['email'] = $emails;

        /*/  é admin  /*/
        $admin = $this->existeAdmin($retorno['pessoa_id']);
        $retorno['admin'] = $admin;

        /*/  permissoes  /*/
        $permissoes = $this->usuarioPermissoes($retorno['pessoa_id']);
        $permissoes = json_decode(json_encode($permissoes), True);
        $retorno['permissoes'] = $permissoes;

        /*/  servidor  /*/
        $servidor = $this->usuarioServidor($retorno['pessoa_id']);
        $servidor = json_decode(json_encode($servidor), True);
        $retorno['servidor'] = $servidor;

        /*/  é aluno  /*/
        $aluno = $this->usuarioAluno($retorno['pessoa_id']);
        $retorno['aluno'] = $aluno;

        /*/  é professor  /*/
        $professor = $this->usuarioProfessor($retorno['pessoa_id']);
        $retorno['professor'] = $professor;


        return $retorno;
    } // Retorna UM usuário específico

    function autenticar_edicao($pessoa_id){
        /*/  ------ dados pessoais ------  /*/
        $data = array(
            'nome' => $_POST['nome'],
            'cpf' => $_POST['cpf'],
            'rg' => $_POST['rg']
        );
        $this->db->where('id', $pessoa_id);
        $this->db->update('pessoa', $data);

        /*/  email  /*/
        $data = array(
            'email' => $_POST['email']
        );
        $this->db->where('pessoa_id', $pessoa_id);
        $this->db->update('email', $data);

        /*/  status  /*/
        $data = array(
            'status' => filter_input(INPUT_POST, 'status')
        );
        $this->db->where('pessoa_id', $pessoa_id);
        $this->db->update('usuario', $data);



        /*/  ------ checkbox Perfil ------  /*/


        /*/  Aluno  /*/
        if (isset($_POST['aluno']))
        {
            $data = array(
                'status' => 'ativo',
                'pessoa_id' => $pessoa_id,
                'situacao' => 'matriculado',
                'periodo' => '1'
            );

            if($this->usuarioAluno($pessoa_id) == 1){
                $this->db->where('pessoa_id', $pessoa_id);
                $this->db->update('aluno', $data);
            }
            else{
                $this->db->insert('aluno', $data);
            }
        }
        else{
            $this->db->where('pessoa_id', $pessoa_id);
            $this->db->delete('aluno');
        }



        /*/  Professor  /*/
        if (isset($_POST['professor']))
        {
            $data = array(
                'carga_horaria' => '40',
                'pessoa_id' => $pessoa_id,
                'status' => 'ativo',
                'ip' => 'xxx-xxx'
            );

            if($this->usuarioProfessor($pessoa_id) >= 1){
                $this->db->where('pessoa_id', $pessoa_id);
                $this->db->update('professor', $data);
            }
            else{
                $this->db->insert('professor', $data);
            }
        }
        else{
            $this->db->where('pessoa_id', $pessoa_id);
            $this->db->delete('professor');
        }



        /*/  Servidor  /*/
        $servidor = isset($_POST["serv"]) ? $_POST["serv"] : NULL;
        $servidores = array();
        if(!empty($servidor)){
            foreach($servidor as $serv){
                array_push($servidores, $serv);
                if($this->existeServidor($serv, $pessoa_id) == 1){
                    $this->db->insert('servidor_pessoa', array('id_servidor' => $serv, 'id_pessoa' => $pessoa_id));
                }
            }
            if(!empty($servidores)){
                if(!in_array(1, $servidores)){
                    $this->db->where('id_pessoa', $pessoa_id);
                    $this->db->where('id_servidor', 1);
                    $this->db->delete('servidor_pessoa');
                }
                if(!in_array(2, $servidores)){
                    $this->db->where('id_pessoa', $pessoa_id);
                    $this->db->where('id_servidor', 2);
                    $this->db->delete('servidor_pessoa');
                }
                if(!in_array(3, $servidores)){
                    $this->db->where('id_pessoa', $pessoa_id);
                    $this->db->where('id_servidor', 3);
                    $this->db->delete('servidor_pessoa');
                }
                if(!in_array(4, $servidores)){
                    $this->db->where('id_pessoa', $pessoa_id);
                    $this->db->where('id_servidor', 4);
                    $this->db->delete('servidor_pessoa');
                }
            }
        }
        else{
            $this->db->where('id_pessoa', $pessoa_id);
            $this->db->delete('servidor_pessoa');
        }



        /*/  Admin  /*/
        $adminPermissoes = isset($_POST["admin"]) ? $_POST["admin"] : NULL;
        $administrador = isset($_POST["administrador"]) ? $_POST["administrador"] : NULL;
        $permissoes = array();
        if(!empty($administrador)){
            if($this->existeAdmin($pessoa_id) == 1){
                $this->db->insert('administrador', array('pessoa_id' => $pessoa_id, 'status' => "ativo"));
            }
            if(!empty($adminPermissoes)){
                foreach($adminPermissoes as $admin){
                    array_push($permissoes, $admin);
                    if($this->existeAdminPermissao($admin, $pessoa_id) == 1){
                        $this->db->insert('permissao_admin', array('admin_id' => $pessoa_id, 'permissao_id' => $admin));
                    }
                }
                if(!empty($permissoes)){
                    if(!in_array(1, $permissoes)){
                        $this->db->where('admin_id', $pessoa_id);
                        $this->db->where('permissao_id', 1);
                        $this->db->delete('permissao_admin');
                    }
                    if(!in_array(2, $permissoes)){
                        $this->db->where('admin_id', $pessoa_id);
                        $this->db->where('permissao_id', 2);
                        $this->db->delete('permissao_admin');
                    }
                    if(!in_array(3, $permissoes)){
                        $this->db->where('admin_id', $pessoa_id);
                        $this->db->where('permissao_id', 3);
                        $this->db->delete('permissao_admin');
                    }
                    if(!in_array(4, $permissoes)){
                        $this->db->where('admin_id', $pessoa_id);
                        $this->db->where('permissao_id', 4);
                        $this->db->delete('permissao_admin');
                    }
                    if(!in_array(5, $permissoes)){
                        $this->db->where('admin_id', $pessoa_id);
                        $this->db->where('permissao_id', 5);
                        $this->db->delete('permissao_admin');
                    }
                    if(!in_array(6, $permissoes)){
                        $this->db->where('admin_id', $pessoa_id);
                        $this->db->where('permissao_id', 6);
                        $this->db->delete('permissao_admin');
                    }
                }
            }
            else{
                $this->db->where('admin_id', $pessoa_id);
                $this->db->delete('permissao_admin');
            }
        }
        else{
            $this->db->where('pessoa_id', $pessoa_id);
            $this->db->delete('administrador');
        }

    } // faz as alterações de edição


    /*/  ------ Funções de busca ------  /*/
    function usuarioEmail($pessoa_id){
        $this->db->select("e.email")
            ->from("email e")
            ->join("pessoa p","p.id=e.pessoa_id")
            ->where("p.id", $pessoa_id);
        $query=$this->db->get();
        $result = $query->result();
        $result = json_decode(json_encode($result), True);

        foreach ($result as $email){
            $result = $email['email'];
        }

        if(is_array($result)){
            $result = "sem email";
        }

        return $result;

    } // busca email da pessoa

    function usuarioPermissoes($pessoa_id){
        $this->db->select("perm.permissao_id")
            ->from("permissao_admin perm")
            ->join("administrador adm","perm.admin_id = adm.pessoa_id")
            ->where("adm.pessoa_id", $pessoa_id);
        $query=$this->db->get();
        $result = $query->result();
        $result = json_decode(json_encode($result), True);

        $retorno = array();
        foreach ($result as $array){
            array_push($retorno, $array['permissao_id']);
        }

        return $retorno;
    } // busca se tem permissões

    function usuarioAluno($pessoa_id){
        $this->db->select("a.id")
            ->from("aluno a")
            ->join("pessoa p","a.pessoa_id = p.id")
            ->where("p.id", $pessoa_id);
        $query=$this->db->get();
        $aluno = $query->result();

        if(count($aluno)){
            return 1;
        }
        else{
            return 0;
        }

    } // busca se é aluno

    function usuarioServidor($pessoa_id){
        $this->db->select("serv.id_servidor")
            ->from("servidor_pessoa serv")
            ->join("pessoa p","serv.id_pessoa = p.id")
            ->where("p.id", $pessoa_id);
        $query=$this->db->get();
        $result = $query->result();
        $result = json_decode(json_encode($result), True);

        $servidor = array();
        foreach ($result as $array){
            array_push($servidor, $array['id_servidor']);
        }

        return $servidor;
    } // busca se é servidor e retorna serviços

    function usuarioProfessor($pessoa_id){
        $this->db->select("pr.id")
            ->from("professor pr")
            ->join("pessoa p","pr.pessoa_id = p.id")
            ->where("p.id", $pessoa_id);
        $query=$this->db->get();
        $professor = $query->result();

        $this->db->select("cc.curso_id")
            ->from("coordenador_curso cc")
            ->join("professor pr","cc.professor_id = pr.id")
            ->join("pessoa p", "pr.pessoa_id = p.id")
            ->where("p.id", $pessoa_id);
        $query=$this->db->get();
        $coordenador = $query->result();

        if(count($professor)){
            if(count($coordenador)){
                return 2;
            }
            return 1;
        }
        else{
            return 0;
        }

    } // busca se é professor

    function existeServidor($servico, $pessoa_id){
        $this->db->select("serv.id_servidor")
            ->from("servidor_pessoa serv")
            ->where("serv.id_pessoa", $pessoa_id)
            ->where('serv.id_servidor', $servico);
        $query=$this->db->get();
        $result = $query->result();

        if(count($result)){
            return 0; // existe
        }
        else{
            return 1; // insert
        }
    } // busca se existe servidor e serviços

    function existeAdmin($pessoa_id){
        $this->db->select("admin.pessoa_id")
            ->from("administrador admin")
            ->where("admin.pessoa_id", $pessoa_id);
        $query=$this->db->get();
        $result = $query->result();

        if(count($result)){
            return 0; // existe
        }
        else{
            return 1; // insert
        }
    } // busca se existe admin

    function existeAdminPermissao($perm, $pessoa_id){
        $this->db->select("pa.admin_id")
            ->from("permissao_admin pa")
            ->where("pa.admin_id", $pessoa_id)
            ->where('pa.permissao_id', $perm);
        $query=$this->db->get();
        $result = $query->result();

        if(count($result)){
            return 0; // existe
        }
        else{
            return 1; // insert
        }
    } // busca se admin tem permissoes


	
	
	
	
}