<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
	}
	
	public function index(){
		$this->data['title']="Cimol";
		if(empty($this->user_data)){
			$this->data['content']="usuario/formulario_login";
		}else{
			$this->data['content']="usuario/index";
		}
		$this->view->show_view($this->data);
		
	}
	
	 /**
	 * 
	 * 
	 */

    public function login(){
        if(empty($this->user_data)){
            $this->data['title']="Cimol";
            $this->data['content']="usuario/formulario_login";
            $this->view->show_view($this->data);
        }else{
            redirect('perfil', 'refresh');
        }
    }

	function autenticar(){
		
		$this->load->model('usuario_model');
		$usuario = $this->input->post('email');
		$senha = md5($this->input->post('senha'));

        $resultado = $this->usuario_model->autenticar($usuario,$senha);

		if($resultado){
			$_SESSION['user_data']['id']=$resultado['id'];
			$_SESSION['user_data']['nome']=$resultado['nome'];

			if($resultado['admin'] == 1){
				$_SESSION['user_data']['permissoes'][]="admin";
				$_SESSION['user_data']['permissoes']['permissoes_admin']=$this->usuario_model->buscarPermissaoAdmin($resultado['id']);
			}
			if($resultado['aluno']){
				$_SESSION['user_data']['permissoes'][]="aluno";
			}
			if($resultado['professor']){
				$_SESSION['user_data']['permissoes'][]="professor";
			}

            redirect('admin/perfil', 'refresh');

			/*/   -- após login o usuário retorna para onde estava
			if(isset($_SESSION['route'])){ redirect($_SESSION['route'], 'refresh'); }
			else{  redirect('perfil', 'refresh');  }
			/*/
			
		}else{
			$this->view->set_message("Login ou senha estão incorretos!","alert alert-danger");
			redirect('', 'refresh');
		}
		
	}
	
	
	function logout(){
		unset($_SESSION['user_data']);
		redirect('login', 'refresh');
	}
	
	
	function esqueceu_senha(){
		
		if(empty($this->user_data)){
			
			$this->data['title']="Cimol";
			$this->data['content']="usuario/esqueceu_senha";
			$this->view->show_view($this->data);
		}
	}
	
	
	function mensagem_recuperar_senha(){
		$this->load->model('usuario_model');
		if($usuario=$this->usuario_model->existe_usuario($this->input->post('email'))){
			
			print_r($usuario);//verifica email
			//Registrar chave de acesso
			$chave_de_acesso=$this->obter_chave_de_acesso($usuario);
			
			if($this->usuario_model->registra_chave_de_acesso($chave_de_acesso, $usuario->pessoa_id)){
				
				$mensagem="OlÃ¡,
					<p>VocÃª esqueceu a sua senha?</p>
					<p> VocÃª estÃ¡ recebendo esta mensagem devido a uma solicitaÃ§Ã£o realizada na seÃ§aÃ£o de login 
						do site da Escola TÃ©cnica Estadual Monteiro Lobato - CIMOL</p>
					
					<p>Se isso for verdade, clique no link a seguir, para definir uma nova senha.</p>
					<a href='".base_url()."usuario/alterar_senha/".$chave_de_acesso."'>Redefinir senha</a>
					<p> Caso vocÃª nÃ£o tenha realizado esta solicitaÃ§Ã£o clique <a href='#'>aqui</a></p>";
					
				
				echo $mensagem;
			}else{
				
				echo ":-(";
			}
			
			//$this->input->post('email');
			
			$para=$usuario->nome;//Nome do destinatÃ¡rio
			$de = $this->input->post('info.cimol@gmail.com', TRUE);        //'E-mail Remetente'
			$para = $this->input->post($usuario->email, TRUE);    //CAPTURA O VALOR DA CAIXA DE TEXTO 'E-mail de Destino'
			///$msg = $this->input->post('$mensagem', TRUE);      //CAPTURA O VALOR DA CAIXA DE TEXTO 'Mensagem'
			$this->load->library('email');                   //CARREGA A CLASSE EMAIL DENTRO DA LIBRARY DO FRAMEWORK
			$this->email->from($de, 'AdministraÃ§Ã£o');                //ESPECIFICA O FROM(REMETENTE) DA MENSAGEM DENTRO DA CLASSE
			$this->email->to($para);                         //ESPECIFICA O DESTINATÃ�RIO DA MENSAGEM DENTRO DA CLASSE
			$this->email->subject('RecuperaÃ§Ã£o de senha');         //ESPECIFICA O ASSUNTO DA MENSAGEM DENTRO DA CLASSE
			$this->email->message($mensagem);	                 //ConteÃºdo da mensagem a ser enviada
			
			if($this->email->send()){//AÃ‡ÃƒO QUE ENVIA O E-MAIL COM OS PARÃ‚METROS DEFINIDOS ANTERIORMENTE
				$this->view->set_message("Mensagem para recuperaÃ§Ã£o de senha enviada com sucesso!", "alert alert-success");
				echo ":-)";
			}else{
				$this->view->set_message("Falha ao enviar mensagem para recuperaÃ§Ã£o de senha! - ", "alert alert-error");
				echo ":-(";
			}
			
		}else{
			$this->view->set_message("usuÃ¡rio nÃ£o encontrado!", "alert alert-success");
		}
		//print_r($_SESSION);
		//redirect('usuario/resposta_mensagem_recuperar_senha', 'refresh');
	}
	
	
	function resposta_mensagem_recuperar_senha(){
		$this->data['title']="Cimol";
		$this->data['content']="usuario/resposta_mensagem_recuperar_senha";
		//print_r($_SESSION);
		$this->view->show_view($this->data);
	}

	
	function alterar_senha($chave_de_acesso=null){
		$this->data['title']="Cimol";
		//Verifica envio formulÃ¡rio
		
		$this->data['template']="usuario/alterar_senha";
		//Verificar se Ã© um usuario logado
		if(isset($_SESSION['user_data'])){
			$this->data['usuario']=$_SESSION['user_data'];
			$this->data['usuario']['chave_de_acesso']=obter_chave_de_acesso();
			
		}else{//Caso o usuÃ¡rio nÃ£o estiver logado
			if($chave_de_acesso){
				echo $chave_de_acesso;
				$this->load->model('Usuario_model');
				if($usuario=$this->Usuario_model->buscar_usuario_por_chave_de_acesso($chave_de_acesso)){
					$this->data['usuario']=$usuario;
					$this->data['usuario']->chave_de_acesso=$chave_de_acesso;
					
				}else{
					$this->view->set_message("InformaÃ§Ãµes inconsistentes, para utilizar esta funcionalidade! ", "alert alert-error");
					redirect('login', 'refresh');
				}
			}else{
				$this->view->set_message("NÃ£o estÃ¡ autorizado a utilizar esta funcionalidade! ", "alert alert-error");
				redirect('login', 'refresh');
			}
			
		}
		$this->view->show_view($this->data);
			
	}
	
	
	function registrar_alteracao_senha(){
		
		
		if($this->usuario_model->alterar_senha($this->input->post('chave_de_acesso'),$this->input->post('email'),$this->input->post('senha'))){
			$this->view->set_message("Senha alterada com sucesso! ", "alert alert-success");
			
		}else{
			$this->view->set_message("Falha na tentativa de alterar a senha! ", "alert alert-error");
				
		}
		redirect('login', 'refresh');
	}

	
	function obter_chave_de_acesso($usuario){
		return md5($usuario->nome.date('s'));
	}
	
	
	function registrar_usuario(){
		echo $this->input->post('email');
		echo "<br/>";
		echo $this->input->post('perfil');
		echo "<br/>";
		//Verificar se \Usuario jÃ¡ existe
		
		if($usuario=$this->Usuario_model->existe_usuario($this->input->post('email'))){
			//verifica o perfil do usuario
			echo "<br/>";
			echo "existe";
		}else{
			echo "<br/>";
			echo "Não existe";
			//aBusca pela pessoa
			//Se a pessoa existir, busca o perfil
				//Registra o usuÃ¡rio
				//Envia mensagem confirmaÃ§Ã£o, com link criaÃ§Ã£o de senha
		}
	}



	/*/  Usuário solicitando criação de um novo usuário  /*/

    function solicitar_novo_usuario(){
        $this->data['title']="Cimol";
        $this->data['content']="usuario/formulario_solicitar_novo_usuario";
        $this->view->show_view($this->data);
    }

    function mandar_email(){  /*/   MANDAR O EMAIL    /*/
        $email = $_POST['email'];

        /*/  Testa se o email existe  /*/
        if($this->usuario_model->existe_email($email)){
            /*/  Testa se o email pertence a um usuário  /*/
            if($this->usuario_model->existe_usuario_email($email)){
                /*/  O usuário já existe  /*/
            }
            else{
                $hash = $this->usuario_model->criar_hash($email);

                //enviar

                $arquivo = "
                    <html>
                        <div>
                            <h1>Solicitação de novo usuário</h1>
                            <h3> Clique <a href='".base_url()."novo_usuario/'".$hash."> aqui </a> para criar seu usuário </h3>
                            
                        </div>
                    </html>
                  ";

                // emails para quem será enviado o formulário
                $destino = $email;
                $assunto = "Criação de Usuário - Cimol";

                // É necessário indicar que o formato do e-mail é html
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: info.cimol@gmail.com';
                //$headers .= "Bcc: $EmailPadrao\r\n";

                mail($destino, $assunto, $arquivo, $headers);


                echo "email enviado";
            }
        }
        else{
            /*/  Não existe o email  /*/
        }
    }

    function novo_usuario($hash){
        if($this->usuario_model->validar_hash($hash)){
            $this->data['content']="usuario/formulario_senha";
            $this->view->show_view($this->data);
        }
        else{
            echo "link espirado";
        }
    }

    function criar_usuario($hash){
        $senha = $_POST['senha'];
        $this->usuario_model->criar_usuario($hash, $senha);
        redirect('login', 'refresh');
    }
	
	
}