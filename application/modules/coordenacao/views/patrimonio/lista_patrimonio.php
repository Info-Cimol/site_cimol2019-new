<?php
$id_patrimonio = isset($serv_patrimonio->id_patrimonio) ? $patrimonio->id_patrimonio : "";
$nome = isset($serv_patrimonio->nome) ? $patrimonio->nome : "";
//$item_id = isset($item->item_id) ? $item->item_id : "";
//$codigo = isset($item->codigo) ? $item->codigo : "";





?>


<html>
<head>
    <meta charset="utf-8">
    <title>Controle de Patrimonios- </title>
    <link href="<?php echo  base_url()?>/assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="<?php echo  base_url()?>/assets/css/estilo.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<script>
function confirmar_exclusao(Patrimonio) {
    if (!confirm("Tem certeza que deseja excluir o Patrimonio: " + patrimonio + "?")) {
        return false;
    }
    alert("Patrimonio Excluido com sucesso!");
    return true;
}
</script>
 <button  style="margin-left: 700px; padding-bottom: 10px" onClick="window.location.href = '<?php echo base_url();?>coordenacao/patrimonio/cadastro_patrimonio';return false;">Novo </button>

<div>      
    <h1>Lista de Patrimonios</h1>



    <div style="background-color: write; margin-left: 400px; padding-bottom: 424px">
    <div class="table-respnsive">        
        <table class="table table-bordered">
            <thead>
                <tr>           
                    <th scope="col">id patrimonio</th>                     
                    <th scope="col">Nome Patrimonio</th>
                                 
                    


                    <tr>
                    </thead>
                    <?php
                    $contador = 0;



                    foreach ($serv_patrimonio as $serv_patrimonios) {
                        ?>
                        <tbody>
                            <tr>                
                                <td><?php echo $serv_patrimonios->id_patrimonio?> </td>                           
                                <td> <a onclick="adicionar_item_modal(<?php echo $serv_patrimonios->id_patrimonio ?>)"  data-toggle="modal" data-target="#exampleModal" ><?php echo $serv_patrimonios->nome?> </a></td>
                                          <?php $contador++;
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">


                <form action="<?php echo base_url("coordenacao/patrimonio/adicionar")?>" method="post">
                  <div class="form-group">
                    <label for="numero_Serie">Numero de série</label>
                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="numero_serie" placeholder="digite o numero">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Código</label>
                    <input type="text" class="form-control" id="codigo"  name="codigo"  placeholder="Código">
                </div>

                <div class="form-group">
                    <label for="numero_Serie">descrição</label>
                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="descricao" placeholder="local">

                    <input type="hidden" class="form-control" id="id_patrimonio"  name="id_patrimonio"   value="" placeholder="Código">



                    <button type="submit"   href="coordenacao/patrimonio/lista_patrimonio"class="btn btn-primary">Submit</button>
                </form>






                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
function adicionar_item_modal($id){
    var id = $id;
//alert();
$('#id_patrimonio').val(id);

}


</script>
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  </script>

  </html>


