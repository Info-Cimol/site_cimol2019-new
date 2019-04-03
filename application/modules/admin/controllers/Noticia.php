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

        if($tags[0]['marcador']!='')
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

    //funcao para editor de texto
	// public function listar_imagens(){
	// 	$this->load->model('imagem_model');
	// 	$imagens=$this->imagem_model->listar_url_imagens();
  //
	// 	echo json_encode($imagens);
	// }

  public function salvar_noticia(){

    if($this->input->post("noticia[id]"))
    {

      $id = $this->input->post("noticia[id]");
      $noticia = $this->input->post("noticia");
      $imagem = $_FILES;
      $this->salvar_editar_noticia($id, $noticia, $imagem);

    }
    else{
      $noticia = $this->input->post("noticia");
      $imagem = $_FILES;
      $this->salvar_nova_noticia($noticia, $imagem);

    }
  }


  //funcao separada para editar noticia, esta funcao nunca deve ser chamada
  //ela foi criada apenas para facilitar a leitura do codigo
  function salvar_editar_noticia($noticia_id, $dados_noticia, $dados_imagem)
  {

    //editar noticia
    //converte informaçoes para um array
    $id = $noticia_id;
    $noticia = $dados_noticia;
    $imagem = $dados_imagem;
    //cria uma variavel para armazenar todas as tags do banco
    $temp=$this->marcador_model->pegar_todos_marcadores();
    $i=0;
    foreach ($temp as $tags) {
      $tags_banco[$i] = $tags->tag_nome;
      $i++;
    }
    //end
    $tags_noticia = explode(";", $noticia['tags']);
    //filtra as tags vindas do form para maiusculas e e sem espacos
    for ($i=0; $i < count($tags_noticia); $i++) {
      $tags_noticia[$i] = strtoupper(trim($tags_noticia[$i]));
      $tags_noticia[$i] = str_replace(" ", "_", $tags_noticia[$i]);
    }
    //end
    //checa se tem alguma tag do form que nao esta salva no banco de dados
    $temp = array_diff($tags_noticia, $tags_banco);
    //se o array n estiver vazio, eh pq tem tags q precisam ser salvas no banco
    if(count($temp)!=0){
      $tags_q_n_tem_no_banco = array();
      for ($i=0; $i < count($tags_noticia); $i++) {
        if(isset($temp[$i])){
          $tags_q_n_tem_no_banco[] = $temp[$i];
        }
      }
      $this->marcador_model->salvar_marcadores($tags_q_n_tem_no_banco);
    }
    //end
    //considerando que todas as tags estao salvas no banco, resta
    //deletar todas as tags que ja haviam sido salvas no banco e reassociar a noticia com as tags do form
    if($this->marcador_model->reset_marcador_noticia($id)){
      $marcadores_id=$this->marcador_model->pegar_id_marcadores($tags_noticia);
      $marcador=$this->marcador_model->associar_marcadores($marcadores_id, $id);
    }
    //end

    //imagem
    //checa se o usuario escolheu uma imagem
    //se sim
    if($imagem['imagem']['error']==0)
    {
      //salva o nome
      $arquivo_imagem = $imagem['imagem']['name'];
      //salva a url para ser usada na library do ci
      $url_imagem = 'public/images/noticias';
      //upar imagem usando ci
      $up_config['upload_path'] = $url_imagem;
      $up_config['allowed_types'] = 'gif|jpg|png';
      $up_config['overwrite'] = TRUE;
      //modifica a url para ser salva no banco
      $url_imagem = $url_imagem.'/';
      //utiliza biblioteca de upload do ci
      $this->load->library('upload', $up_config);
      //checa se deu certo
      if($this->upload->do_upload('imagem')){
        $data_image = $this->upload->data();
      }else{
        $data_image['erro']=$this->upload->display_errors();
      }

    }//se nao, puxa a imagem padrao
    else {
        $arquivo_imagem = $noticia['nome_imagem'];
        $url_imagem = $noticia['url_imagem'];
    }
      //se deu certo com o upload e tags salva as novas informaçoes da noticia
      if(!isset($data_image['erro'])){
        $dados = array(
          'titulo' => $noticia['titulo'],
          'resumo' => $noticia['resumo'],
          'conteudo' => $noticia['conteudo'],
          'url_imagem' => $url_imagem,
          'arquivo_imagem' => $arquivo_imagem,
          'data_postagem' => $noticia['data'],
        );


        if($this->noticia_model->editar($dados, $id)){

          $this->view->set_message("Noticia editada com sucesso", "alert alert-success");
          redirect('admin/noticia', 'refresh');
        }else{
          $this->view->set_message("Ocorreu um erro ao editar noticia", "alert alert-error");
          redirect('admin/noticia', 'refresh');
        }
      }//se td deu errado, manda mensagem
      else{
        echo "algo deu errado";
      }
      //end

  }

  //funcao separada para salvar a noticia no banco, esta funcao nunca deve ser chamada
  //ela foi criada apenas para facilitar a leitura do codigo
  function salvar_nova_noticia($dados_noticia, $dados_imagem){
    //converte informaçoes para um array
    $noticia = $dados_noticia;
    $imagem = $dados_imagem;
    //checa se usuario escolheu a imagem
    // se sim
    if($imagem['imagem']['error']==0){
      //salva nome
      $arquivo_imagem = $imagem['imagem']['name'];
      //salva url pra library
      $url_imagem = 'public/images/noticias';
      //salva config da library
      $up_config['upload_path'] = $url_imagem;
      $up_config['allowed_types'] = 'gif|jpg|png';
      $up_config['overwrite'] = TRUE;
      $url_imagem = $url_imagem.'/';
      //carrega library
      $this->load->library('upload', $up_config);
      //checa se upo
      //se sim
      //guarda as info da imagem
      if($this->upload->do_upload('imagem')){
        $data_image = $this->upload->data();
      }//se nao, guarda o erro
      else{
        $data_image['erro']=$this->upload->display_errors();
      }

    }//se nao, guarda a imagem padrao
    else {
      $arquivo_imagem = 'noticia-def.jpg';
      $url_imagem = 'public/images/temp/';
    }
    //checa se n deu erro no upload, e guarda os dado da noticia e posta
    if(!isset($data_image['erro'])){
      $dados = array(
        'titulo' => $noticia['titulo'],
        'resumo' => $noticia['resumo'],
        'conteudo' => $noticia['conteudo'],
        'url_imagem' => $url_imagem,
        'arquivo_imagem' => $arquivo_imagem,
        'data_postagem' => $noticia['data'],
      );
      //posta a noticia
      if($this->noticia_model->postar_noticia($dados)){
        //tags
        //cria uma variavel para armazenar todas as tags do banco
          $temp=$this->marcador_model->pegar_todos_marcadores();
          $i=0;
          foreach ($temp as $tags) {
            $tags_banco[$i] = $tags->tag_nome;
            $i++;
          }
          //end
          //filtra as tags vindas do form para maiusculas e e sem espacos
          $tags_noticia = explode(";", $noticia['tags']);
          for ($i=0; $i < count($tags_noticia); $i++) {
            $tags_noticia[$i] = strtoupper(trim($tags_noticia[$i]));
            $tags_noticia[$i] = str_replace(" ", "_", $tags_noticia[$i]);
          }
          //end
          //checa se tem alguma tag do form que nao esta salva no banco de dados
          $temp = array_diff($tags_noticia, $tags_banco);
          //se o array n estiver vazio, eh pq tem tags q precisam ser salvas no banco
          if(count($temp)!=0){
            $tags_q_n_tem_no_banco = array();
            for ($i=0; $i < count($tags_noticia); $i++) {
              if(isset($temp[$i])){
                $tags_q_n_tem_no_banco[] = $temp[$i];
              }
            }
            $this->marcador_model->salvar_marcadores($tags_q_n_tem_no_banco);
          }
          //end
          //considerando que todas as tags estao no banco resta
          //pegar o id desse marcadores
          $marcadores_id = $this->marcador_model->pegar_id_marcadores($tags_noticia);
          //pegar o id desta noticia
          $noticia_id = $this->noticia_model->id_ultima_noticia();
          //associar os marcadores para noticia
          $this->marcador_model->associar_marcadores($marcadores_id, $noticia_id);


        $this->view->set_message("Noticia postada com sucesso", "alert alert-success");
        redirect('admin/noticia', 'refresh');
      }else{
        $this->view->set_message("Ocorreu um erro ao portar noticia", "alert alert-error");
        redirect('admin/noticia', 'refresh');
      }

  }
    }
}
