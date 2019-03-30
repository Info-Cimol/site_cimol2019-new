
<!-- Carrega o CSS do armário -->
<link type="text/css" href="<?php echo base_url();  ?>public/temas/admin/css/armario.css" rel="stylesheet">
<!-- Carrega o CSS do Serviço -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">

<div class="d-flex flex-wrap mb-5">
    <div class="static-widget" style="margin-right: 10px; margin-left: 200px; height: 35px; background-color: #3CB371;">
        <h4 class="m-0" >Alugados</h4>
        <h4 style="font-size: 20px;" id="qt_alugados"></h4>
    </div>
    <div class="static-widget text-white" style="margin-right: 10px; height: 35px; background-color: #6A5ACD;">
        <h4 class="m-0">Disponíveis</h4>
        <h4 style="font-size: 20px;" id="qt_disponiveis"></h4>
    </div>
    <div class="static-widget" style="margin-right: 10px; height: 35px; background-color: #FF0000;">
        <h4 class="m-0">Vencidos</h4>
        <h4 style="font-size: 20px;" id="qt_vencidos"></h4>
    </div>
</div>

<div style="margin-left: 500px; margin-top: 5px; ">
  <table >
    <tr >
      <td ><span class="input-icon input-icon-left" style="font-size: 18px;">Filtrar</span></td>
      <td>
        <select class="form-control-lg" id="select_armario" style="height: 45px;">
          <option value="todos">Todos</option>
          <option value="locados">Locados</option>
          <option value="disponiveis">Disponíveis</option>
          <option value="vencidos">Vencidos</option>
        </select>
      </td>
      <td><a style="margin-left: 5px;" href="<?php echo base_url() ?>coordenacao/armario/alugar" class="btn btn-primary active center" role="button" aria-pressed="true">&ensp;Alugar&ensp;</a></td>
      <td><a style="margin-left: 10px;" href="<?php echo base_url() ?>coordenacao/armario/devolver" class="btn btn-primary active center" role="button" aria-pressed="true">Devolver</a></td>
    </tr>
  </table>
</div>


<div class="wrapper">
  <!-- DIV ONDE SÃO CARREGADOS OS CARDS POR JQUERY E AJAX -->
  <div id="cards">
  </div>
</div>
	   
<script src="<?php echo base_url();  ?>public/temas/admin/scripts/ajax.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    
    // Ajax que busca todos os cards da pagina inicial
    $.ajax({
      url:"<?php echo base_url() ?>coordenacao/armario/busca_todos_armarios_index_ajax",
      method:"POST",
      dataType: 'json',
        //data:{select_armario:select_armario},
        success:function(data){
          // Limpa a div "CARDS". Quando o usuário clica novamente em "todos", a DIV é limpa para carregar todos os cards.
          $('#cards').empty();

          $('#qt_alugados').html(data['locados'].length);
          $('#qt_vencidos').html(data['vencidos'].length);
          $('#qt_disponiveis').html(data['disponiveis'].length);
          
          for (var i = 0; i < data['locados'].length; i++) {
           // Altera o formato da data no card
           var d = new Date(data['locados'][i].data_fim);
           data_fim = (d.toLocaleDateString());
           // Adiciona os cards na div "CARDS"
           $('#cards').prepend('<div class="card"><h2 class="card-title" >'+data['locados'][i].numero+'</h2><p>'+data['locados'][i].nome+'</p><h4>Entrega '+data_fim+'</h4>');          
         }

         for (var i = 0; i < data['vencidos'].length; i++) {
           var d = new Date(data['vencidos'][i].data_fim);
           data_fim = (d.toLocaleDateString());
           $('#cards').append('<div class="card-vencido"><h2 class="card-title" >'+data['vencidos'][i].numero+'</h2><p>'+data['vencidos'][i].nome+'</p><h4>Vencido '+data_fim+'</h4>');          
         }

         for (var i = 0; i < data['disponiveis'].length; i++) {
           var d = new Date(data['disponiveis'][i].data_fim);
           data_fim = (d.toLocaleDateString());
           $('#cards').append('<div class="card-disponivel"><h2 class="card-title" >'+data['disponiveis'][i].numero+'</h2><p></p><h4>Disponível</h4>');          
         }
         
       }
     })
  })

    // Quando o usuário filtra os armários é carregado um ajax que busca os armários selecionados
    $('#select_armario').change(function(){
      var select_armario = $('#select_armario').val();

          switch (select_armario) {
            // Carrega apenas armários locados
            case 'locados':
               $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/armarios_locados_ajax",
                    method:"POST",
                    dataType: 'json',
                    data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                    for (var i = 0; i < data.length; i++) {
                         var d = new Date(data[i].data_fim);
                         data_fim = (d.toLocaleDateString());                         
                         $('#cards').prepend('<div class="card"><h2 class="card-title" >'+data[i].numero+'</h2><p>'+data[i].nome+'</p><h4>Entrega '+data_fim+'</h4>');          

                         }
                         //console.log(data);
                    }
               })
            break;
            // Carrega apenas armários disponíveis
            case 'disponiveis':
               $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/busca_armarios_disponiveis_ajax",
                    method:"POST",
                    dataType: 'json',
                    data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                    for (var i = 0; i < data.length; i++) {
                         $('#cards').prepend('<div class="card-disponivel"><h2 class="card-title">'+data[i].numero+'</h2><h4 id="titulo_disponivel">Disponível</h4>');          
                         }
                         //console.log(data);
                    }
               })
            break;
            // Carrega apenas armários vencidos
            case 'vencidos':
               $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/armarios_vencidos_ajax",
                    method:"POST",
                    dataType: 'json',
                    data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                    for (var i = 0; i < data.length; i++) {
                         var d = new Date(data[i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').prepend('<div class="card-vencido"><h2 class="card-title" id="numero_vencido">'+data[i].numero+'</h2><p id="nome_vencido">'+data[i].nome+'</p><h4 id="entrega_vencido">Vencido '+data_fim+'</h4>');          
                         }
                         //console.log(data);
                    }
               })
            break;
            // Carrega todos os armários
            case 'todos':
              $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/busca_todos_armarios_index_ajax",
                    method:"POST",
                    dataType: 'json',
                    //data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                      
                      for (var i = 0; i < data['locados'].length; i++) {
                         var d = new Date(data['locados'][i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').prepend('<div class="card"><h2 class="card-title" >'+data['locados'][i].numero+'</h2><p>'+data['locados'][i].nome+'</p><h4>Entrega '+data_fim+'</h4>');          
                      }

                      for (var i = 0; i < data['vencidos'].length; i++) {
                         var d = new Date(data['vencidos'][i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').append('<div class="card-vencido"><h2 class="card-title" >'+data['vencidos'][i].numero+'</h2><p>'+data['vencidos'][i].nome+'</p><h4>Entrega '+data_fim+'</h4>');          
                      }

                      for (var i = 0; i < data['disponiveis'].length; i++) {
                         var d = new Date(data['disponiveis'][i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').append('<div class="card-disponivel"><h2 class="card-title" >'+data['disponiveis'][i].numero+'</h2><h4>Disponível</h4>');          
                      }
                  
                    }
               })

            break;

          }
            
 })
</script>