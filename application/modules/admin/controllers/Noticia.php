<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends MX_Controller {
    public function __construct(){
        parent::__construct();
		
        $this->load->model('noticia_model');
        $this->load->model('imagem_model');
        $this->load->model('usuario_model');
        $this->data['usuario']=$this->usuario_model->buscar_perfil($this->user_data["id"]);
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
    
    public function buscar_noticia($id){
        $noticia=$this->noticia_model->buscar_noticia($id);
        $imagens=$this->imagem_model->buscar_imagens($id);
        $resultado=array_merge($noticia, $imagens);
		echo json_encode($resultado);
    }
    
    public function excluir_imagem_noticia($imagem_id, $noticia_id){
    	$this->noticia_model->deletar_imagem_noticia($imagem_id, $noticia_id);
    }
   
}		