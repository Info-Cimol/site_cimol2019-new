<?php

class Marcador_model extends CI_Model{

  function pegar_todos_marcadores(){

    $this->db->select("marcador.marcador as tag_nome")
            ->from('marcador');
    $query=$this->db->get();
    return $query->result();

  }

  function pegar_tag_noticia($id){

    $conn = new mysqli('localhost', 'root', '', 'cimol2');
    $sql = "select m.marcador FROM marcador m join marcador_noticia mn on mn.marcador_id=m.id and mn.noticia_id=".$id;
    $query = $conn->query($sql);
     while($row = $query->fetch_assoc()) {
        $tags[] = $row;
      }

      if(isset($tags)){

        return $tags;
      }else{
        $tags=0;
        return $tags;
      }
  }

  function pegar_id_marcadores($marcadores){


    for ($i=0; $i < count($marcadores); $i++) {
      $this->db->select("m.id")->from('marcador m')->where('marcador =', $marcadores[$i]);
      $query=$this->db->get();
      $res = $query->result();
      $tags[]=$res;
    }
    $i=0;
    foreach ($tags as $tag) {
      $id_tags[$i]=$tags[$i][0]->id;
      $i++;
    }


    return $id_tags;

  }


  function salvar_marcadores($marcadores){

    for ($i=0; $i < count($marcadores); $i++) {
      $this->db->insert("marcador", array('marcador'=> $marcadores[$i]));
    }
    return true;

  }

  function associar_marcadores($marcadores_id, $noticia_id){

    for ($i=0; $i < count($marcadores_id); $i++) {
      $this->db->insert("marcador_noticia", array('marcador_id' => $marcadores_id[$i], 'noticia_id' => $noticia_id));
    }
    return true;

  }

  function reset_marcador_noticia($noticia_id)
  {
    if($this->db->delete('marcador_noticia', array('noticia_id'=>$noticia_id))){
        return true;
    }else{
        return false;
    }

  }

}

 ?>
