<html>
<head>
<meta charset="utf-8">
<title>Controle de Patrimonios- </title>
<link href="<?php echo  base_url()?>/assets/css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo  base_url()?>/assets/css/estilo.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
<div>      
    <h1>Lista de Patrimonios</h1>
   
   
    <?= anchor("coordenacao/patrimonio/adicionar", "Adicionar ", array("class" => "btn btn-primary")) ?>

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
                        <td><?php echo $serv_patrimonios->id_patrimonio ?> </td>                           
                        <td> <a href="<?php echo base_url() . "coordenacao/patrimonio/lista_patrimonio/" . $serv_patrimonios->id_patrimonio ?>"><?php echo $serv_patrimonios->nome?> </a></td>

                        <td><a href="<?php echo base_url() . "coordenacao/patrimonio/excluir/" . $serv_patrimonios->id_patrimonio ?>" onclick="return confirmar_exclusao('<?php echo $serv_patrimonios->id_patrimonio ?>')" class="btn btn-danger">Excluir</a></td>
                        <td><a href="<?php echo base_url() . "coordenacao/patrimonio/editar/" . $serv_patrimonios->id_patrimonio ?>" onclick=" return ('<?php echo $serv_patrimonios->id_patrimonio?>')" class="btn btn-primary">Editar</a></td>               
                    </tr>             <?php $contador++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
    Total de Registros: <?= $contador ?>
</div>

  

</html>

