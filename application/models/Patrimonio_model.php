<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patrimonio_model extends CI_Model{
    
    public function listaPatrimonio() {
        
        return $this->db->get('serv_patrimonio');
        
        
        
    }  
    public function listaItem() {
        
        return $this->db->get('serv_item');
        
        
        
    }  
    
     public function buscaPatrimonio() {
        $pesq = $this->input->post("pesq");
            $this->db->like("id_patrimonio",$pesq);
             return $this->db->get('serv_patrimonio');
        
        
        
    }  
    public function getPatrimonios($id) {
        return $this->db->where("id_patrimonio",$id)->get("serv_patrimonio");
        
        
        
        
    }
    
    public function excluir($id){
        return $this->db->where("id_patrimonio",$id)->delete("serv_patrimonio")   ;
       
    }
    public function salvar(){
        $id_patrimonio= $this->input->post("id_patrimonio");
        
        $valores= array(
                    "id_patrimonio"=>$this->input->post("id_patrimonio"),
                    "nome" =>$this->input->post("nome"),
          
            
        );
        if($id_patrimonio=="")
            $qry = $this->db->insert("serv_patrimonio",$valores);
        else{
            $this->db->where("id_patrimonio",$id_patrimonio);
            $qry= $this->db->update("serv_patrimonio",$valores);
        }
       
        return $qry;   
        
        
    }

    public function adicionar(){

        $this->db->where("id_patrimonio",$id)-get("serv_patrimonio");

        $valores=array(
            "id_patrimonio"=>$this->input->post("id_patrimonio"),
                    "nome" =>$this->input->post("nome"),
                    "id_item"=>$this->input->post("id_item"),
                    "numero_serie" =>$this->input->post("numero_serie"),
                    "codigo"=>$this->input->post("codigo"),
                   
            




            );





    }
}


    
        

