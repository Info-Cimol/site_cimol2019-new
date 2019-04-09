<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		if(isset($this->user_data)){
			if(!in_array('admin', $this->user_data['permissoes'])){
				$_SESSION['route']="admin";
				//redirect('', 'refresh');

			}
		}else{
			$_SESSION['route']="admin";
			redirect('login', 'refresh');
		}
	}
	public function index()
	{
        $this->load->model('usuario_model');
	    $this->perfil();
	}

	public function buscar_agenda($id){
		$agenda=$this->agenda_model->buscar_agenda($id);
		echo json_encode($agenda);
	}

    function perfil(){
        $this->data['title']="Cimol";
        $this->load->model('usuario_model');
        if(!empty($this->user_data)){
            //print_r($this->user_data);
            $this->data['usuario']=$this->usuario_model->buscar_perfil($this->user_data["id"]);
            $this->data['content']="perfil";
        }else{
            $this->data['content']="usuario/formulario_login";
        }
        $this->view->show_view($this->data);
    }
}
