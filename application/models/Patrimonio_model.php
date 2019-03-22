<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patrimonio_model extends CI_Model{

    public function listaPatrimonio() {

        /*
        $this->db->select('nome, numero_serie, codigo, descricao, id_patrimonio')
        ->from('serv_patrimonio')
        ->join('serv_item_patrimonio', 'serv_patrimonio_id_patrimonio=id_patrimonio')
        ->join('serv_local', 'serv_item_patrimonio_id_item=id_item');
        //->where('serv_patrimonio_id_patrimonio=', $valores['serv_patrimonio_id_patrimonio']);
        $query=$this->db->get();
        $resultado=$query->result();

        //return $this->db->get('serv_patrimonio'); 
        return $resultado;
        */

        $this->db->select('*')
        ->from('serv_patrimonio');
        $query=$this->db->get();
        $resultado=$query->result();

        //return $this->db->get('serv_patrimonio'); 
        return $resultado;
        
        
    } 
    public function listaItem() {

        
        $this->db->select('nome, numero_serie, codigo, descricao, id_patrimonio')
        ->from('serv_patrimonio')
        ->join('serv_item_patrimonio', 'serv_patrimonio_id_patrimonio=id_patrimonio')
        ->join('serv_local', 'serv_item_patrimonio_id_item=id_item');
        //->where('serv_patrimonio_id_patrimonio=', $valores['serv_patrimonio_id_patrimonio']);
        $query=$this->db->get();
        $resultado=$query->result();

        //return $this->db->get('serv_patrimonio'); 
        return $resultado;
        

        
        
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
        if($id_patrimonio==""){
            $qry = $this->db->insert("serv_patrimonio",$valores);
        }else{
            $this->db->where("id_patrimonio",$id_patrimonio);
            $qry= $this->db->update("serv_patrimonio",$valores);
        }
            redirect("coordenacao/patrimonio/lista_patrimonio");
        return $qry;  

        
    }

    public function adicionar(){

        //$this->db->where("id_item",$id)-get("serv_item_patrimonio");
        $valores=array(

         "serv_patrimonio_id_patrimonio"=>$this->input->post("id_patrimonio"),
         "numero_serie" =>$this->input->post("numero_serie"),
         "codigo"=>$this->input->post("codigo"),
         );
        
        $this->db->insert("serv_item_patrimonio",$valores);

        
        $this->db->select('id_item as id_item')
        ->from('serv_item_patrimonio')
        ->where('serv_patrimonio_id_patrimonio=', $valores['serv_patrimonio_id_patrimonio']);
        $query=$this->db->get();
        $resultado=$query->result();

        $item=array(

           "serv_item_patrimonio_id_item"=> $resultado[0]->id_item,
           "descricao" =>$this->input->post("descricao"),

           );

        $this->db->insert("serv_local",$item);


        $data=array(

            'data_movimento'=>date('Y-m-d'),
            'descricao'=>3,       
            "serv_item_patrimonio_id_item"=> $resultado[0]->id_item,


            );

        $this->db->insert("serv_movimento",$data);
    }


}











