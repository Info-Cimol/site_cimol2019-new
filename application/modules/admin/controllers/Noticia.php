<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends MX_Controller {
    public function __construct(){
        parent::__construct();

       if(isset($this->user_data) ){
			if(!in_array('admin', $this->user_data['permissoes'])){
				redirect('', 'refresh');
			}
		}else{
			redirect('login', 'refresh');
		}

        $this->load->model('noticia_model');
        $this->load->model('marcador_model');
        $this->load->model('imagem_model');
        date_default_timezone_set("Brazil/East");
    }

    public function index()
    {
        $this->data['title']="Cimol - Área do Administrador";
        $this->data['content']="noticia/noticia";
        $this->data['noticias']=$this->noticia_model->listar_noticias();
        $this->view->show_view($this->data);
        unset($_SESSION["post"]);
        setcookie('noticia');
    }

    public function deletar_noticia($id){
        if($this->noticia_model->deletar_noticia($id)){
        	$this->view->set_message("Noticia deletada com sucesso", "alert alert-success");
    		redirect('admin/noticia', 'refresh');
    	}else{
    		$this->view->set_message("Ocorreu um erro ao deletar noticia", "alert alert-error");
    		redirect('admin/noticia', 'refresh');
    	}
    }

    public function nova_noticia(){

        $this->data['title']="Cimol - Área do Administrador";
    	   $this->data['content']="noticia/formulario_noticia";
	      $this->view->show_view($this->data);
    }


    public function editar_noticia($id){
        $noticia=$this->noticia_model->buscar_noticia($id);
        $tags=$this->marcador_model->pegar_tag_noticia($id);

        $this->data['title']="Cimol - Área do Administrador";
    		$this->data['content']="noticia/formulario_noticia";
    		$this->data['noticia'] = $noticia;
    		$this->data['tags_noticia'] = $tags;
    		$this->view->show_view($this->data);
    }

    public function visualizar_noticia($id){
        $noticia=$this->noticia_model->buscar_noticia($id);

        $this->data['title']="Cimol - Área do Administrador";
    		$this->data['content']="noticia/visualizar_noticia";
    		$this->data['noticia'] = $noticia;
    		$this->view->show_view($this->data);
    }


	// public function listar_imagens(){
	// 	$this->load->model('imagem_model');
	// 	$imagens=$this->imagem_model->listar_url_imagens();
  //
	// 	echo json_encode($imagens);
	// }


    public function salvar_noticia()
	{
    //$this->load->library('util');

		if($this->input->post("noticia[id]"))
    {
      //editar noticia
			$id = $this->input->post("noticia[id]");

      //Tags


      //imagem
			if($_FILES['imagem']['error']==0)
      {
				$arquivo_imagem = $_FILES['imagem']['name'];
				$url_imagem = 'public/images/noticias';

				$up_config['upload_path'] = $url_imagem;
				$up_config['allowed_types'] = 'gif|jpg|png';
				$up_config['overwrite'] = TRUE;
				$url_imagem = $url_imagem.'/';

				$this->load->library('upload', $up_config);

				if($this->upload->do_upload('imagem')){
					$data_image = $this->upload->data();
				}else{
					$data_image['erro']=$this->upload->display_errors();
				}

			}else {

        if($this->input->post('noticia[nome_imagem]')){
					$arquivo_imagem = $this->input->post('noticia[nome_imagem]');
					$url_imagem = $this->input->post('noticia[url_imagem]');
				}
        else
        {
					$arquivo_imagem = 'noticia-def.jpg';
					$url_imagem = 'public/images/temp/';
				}

			}

			if(!isset($data_image['erro'])){
				$dados = array(
					'titulo' => $this->input->post('noticia[titulo]'),
					'conteudo' => $this->input->post('noticia[conteudo]'),
					'resumo' => $this->input->post('noticia[resumo]'),
					'url_imagem' => $url_imagem,
					'arquivo_imagem' => $arquivo_imagem,
					'data_postagem' => $this->input->post('noticia[data]'),
				);

      }
				if($this->noticia_model->editar($dados, $id)){
					$this->view->set_message("Noticia editada com sucesso", "alert alert-success");
					redirect('admin/noticia', 'refresh');
				}else{
					$this->view->set_message("Ocorreu um erro ao editar noticia", "alert alert-error");
					redirect('admin/noticia', 'refresh');
				}



		}
    else{
      //nova noticia
			if($_FILES['imagem']['error']==0){

				$arquivo_imagem = $_FILES['imagem']['name'];
        $dados_form_noticia = $this->input->post("noticia");

				$url_imagem = 'public/images/noticias';

				$up_config['upload_path'] = $url_imagem;
				$up_config['allowed_types'] = 'gif|jpg|png';
				$up_config['overwrite'] = TRUE;
        $url_imagem = $url_imagem.'/';

				$this->load->library('upload', $up_config);

				if($this->upload->do_upload('imagem')){
					$data_image = $this->upload->data();
				}else{
					$data_image['erro']=$this->upload->display_errors();
				}

			}else {
				$arquivo_imagem = 'noticia-def.jpg';
				$url_imagem = 'public/images/temp/';
			}

			if(!isset($data_image['erro'])){
				$dados = array(
					'titulo' => $this->input->post('noticia[titulo]'),
					'conteudo' => $this->input->post('noticia[conteudo]'),
					'resumo' => $this->input->post('noticia[resumo]'),
					'url_imagem' => $url_imagem,
					'arquivo_imagem' => $arquivo_imagem,
					'data_postagem' => $this->input->post('noticia[data]'),
				);

        if($noticia=$this->noticia_model->postar_noticia($dados)){
          //tags
          $marcador=$this->marcador_model->pegar_marcadores();
          $i=0;
          foreach ($marcador as $tags) {
            $tags_banco[$i] = $tags->tag_nome;
            $i++;
          }

          $tags_noticia = explode(";", $this->input->post('noticia[tags]'));
          for ($i=0; $i < count($tags_noticia); $i++) {
            $tags_noticia[$i] = strtoupper(trim($tags_noticia[$i]));
            $tags_noticia[$i] = str_replace(" ", "_", $tags_noticia[$i]);
          }

          $temp = array_diff($tags_noticia, $tags_banco);
          $tags_q_n_tem_no_banco;
          for ($i=0; $i < count($tags_noticia); $i++) {
            if(isset($temp[$i])){
              $tags_q_n_tem_no_banco[] = $temp[$i];
            }
          }
          if(isset($tags_q_n_tem_no_banco)){
            $this->marcador_model->salvar_marcadores($tags_q_n_tem_no_banco);
          }
          $marcadores_id=$this->marcador_model->pegar_id_marcadores($tags_noticia);
          $noticia_id = $this->noticia_model->id_ultima_noticia();
          $marcador=$this->marcador_model->associar_marcadores($marcadores_id, $noticia_id);


  				$this->view->set_message("Noticia postada com sucesso", "alert alert-success");
  				redirect('admin/noticia', 'refresh');
  			}else{
  				$this->view->set_message("Ocorreu um erro ao portar noticia", "alert alert-error");
  				redirect('admin/noticia', 'refresh');
  			}

        //tags



		}
	}

    }
}
