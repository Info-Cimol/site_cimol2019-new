<?php
//$id_patrimonio = isset($serv_patrimonio->id_patrimonio) ? $patrimonio->id_patrimonio : "";
//$nome = isset($serv_patrimonio->nome) ? $patrimonio->nome : "";
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
<button  style="margin-left: 700px; padding-bottom: 10px" <a class="btn btn-success" onClick="window.location.href = '<?php echo base_url();?>coordenacao/patrimonio/cadastro_patrimonio';return false;">Novo </a></button>

<div>      
    <h1>Lista de Patrimonios</h1>



    <div style="background-color: write; margin-left: 400px; padding-bottom: 424px">
        <div class="table-respnsive">        
            <table class="table table-striped" style="border-style: solid">
                <thead>
                    <tr>           
                        <th  scope="col">id patrimonio</th>                     
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
                                    <td> <?php echo $serv_patrimonios->nome?> </td>
                                    <?php $contador++;
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                ...
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


