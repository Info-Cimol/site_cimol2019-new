<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patrimonio_model extends CI_Model{
    
    public function listaPatrimonio() {
        
        return $this->db->get('Patrimonio');
        
        
        
    }  
    public function listaItem() {
        
        return $this->db->get('item');
        
        
        
    }  
    
     public function buscaPatrimonio() {
        $pesq = $this->input->post("pesq");
            $this->db->like("id_patrimonio",$pesq);
             return $this->db->get('patrimonio');
        
        
        
    }  
    public function getPatrimonios($id) {
        return $this->db->where("id_patrimonio",$id)->get("patrimonio");
        
        
        
        
    }
    
    public function excluir($id){
        return $this->db->where("id_patrimonio",$id)->delete("patrimonio")   ;
       
    }
    public function salvar(){
        $id_patrimonio= $this->input->post("id_patrimonio");
        
        $valores= array(
                    "id_patrimonio"=>$this->input->post("id_patrimonio"),
                    "nome" =>$this->input->post("nome"),
          
            
        );
        if($id_patrimonio=="")
            $qry = $this->db->insert("patrimonio",$valores);
        else{
            $this->db->where("id_patrimonio",$id_patrimonio);
            $qry= $this->db->update("patrimonio",$valores);
        }
       
        return $qry;   
        
        
    }
    
        

}