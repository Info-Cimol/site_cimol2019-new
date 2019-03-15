<style type="text/css">
  label{
    font-size: 15px;
  }
</style>

<div style="float: left; width: 300px">&emsp;</div>
<div style="float: left;">
  


    <form  method="post" id="form_alugar" action="<?php echo base_url() ?>coordenacao/armario/armario_alugado">
        <br><br>        
        <div class="form-group">
            <label for="armario_id">Selecione o numero do armário</label>
            <select class="form-control" style="width: 250px; height: 40px;" id="armario_id" name="armario_id"></select>
            <button type="button" class="btn btn-primary" data-toggle="modal" style="height: 30px; margin-bottom: 10px;" data-target="#exampleModal">+</button> 
        </div>
     
        <div class="formgroup">
            <label for="aluno_id">Selecione o aluno</label>
            <select class="form-control" style="width: 250px; height: 40px; margin-right: 30px;" id="aluno_id" name="aluno_id">
            </select> 
        </div>
     
        <div class="form-group">
            <label for="data_inicio">Data de Início</label>
            <input type="date" style="width: 240px; height: 30px; margin-right: 30px" class="form-control" id="data_inicio" name="data_inicio" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Entrega</label>
            <input type="date" style="width: 240px; height: 30px; margin-right: 30px" class="form-control" id="data_fim" name="data_fim" placeholder="Password">
        </div>
        
        <div class="form-group" style="text-align: center;">
          <br>
          <button type="submit" class="btn btn-success btn btn-lg" name="alugar">Alugar</button>         
        </div>

    </form>

</div>
<div style="float: left;"></div>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Incluir armário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center" >
        
        <div id="modal"></div>
        
        <div id="modal_body">
          <form  id="cadastrar_armario"  method="post">
            <div class="form-group">   
                <h4>Digite o numero do armario</h4>
                <br>
                <input type="text" class="form-control" id="numero" name="numero" >
            </div>
            <br><br>
            <button type="button" class="btn btn-secondary" id="sair" data-dismiss="modal">Sair</button>
            <input type="submit" class="btn btn-primary"  name="cadastrar_armario" value="Cadastrar Armario">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
      //$('#modal').hide();
      // Popula por ajax o select com os numeros dos armarios disponiveis
      $.ajax({
        url:"<?php echo base_url() ?>coordenacao/armario/busca_armarios_disponiveis_ajax",
        method:"POST",
        dataType: 'json',
        success:function(data){
          //alert('rr');
          //console.log(data);
            for (var i = 0; i <= data.length; i++) {
               $('#armario_id').prepend("<option value="+data[i].id+" >"+data[i].numero+"</option>");
               //console.log(data.numero);
            }      
        }
      })

      // Permite somente numeros quando cadastra um armario no modal
      $("#numero").keypress(function(e) {
        var square = document.getElementById("numero");
          var key = (window.event)?event.keyCode:e.which;
        if((key > 47 && key < 58)) {
          return true;
        } else {
          return (key == 8 || key == 0)?true:false;
        }

      });

    })
    
    $(document).ready(function(){
      // Popula por ajax o select com os alunos do curso
      $.ajax({
        url:"<?php echo base_url() ?>coordenacao/armario/busca_aluno_alugar_ajax",
        method:"POST",
        dataType: 'json',
        success:function(data){
              for (var i = 0; i <= data.length; i++) {
                $('#aluno_id').prepend("<option value="+data[i].id+">"+data[i].nome+"</option>");
              }
          }
      })         
    })

    // Submete o formulariodo modal que cadastra o armario
    $('#cadastrar_armario').submit(function(e){
      e.preventDefault();
      var numero = $('#numero').val();
      if (numero == "") {
        $('#modal').html('<div class="alert alert-danger" role="alert"><h4>Informe o numero do armario</h4></div>');
        return false;
      }

      $.ajax({
        url:"<?php echo base_url() ?>coordenacao/armario/cadastrar_armario",
        method:"POST",
        dataType: 'json',
        data: {numero:numero},
        success:function(data){

              if (data > 0) {
                $('#modal').html('<div class="alert alert-danger" role="alert"><h4>Armario   '+numero+' ja esta cadastrado</h4></div>');
                $('#sair').click(function(){
                  $('#modal').empty();
                  $('#numero').val("");
                });
              }else{
                $('#modal_body').hide();
                $('#modal').show();
                $('#modal').empty();
                $('#modal').prepend('<div class="alert alert-success" role="alert"><h4>Cadastro realizado com sucesso</h4></div>');
                $('#modal').append('<br><button id="fechar_modal" type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>');
                $('#fechar_modal').click(function(){
                  $('#modal').hide();
                  $('#modal_body').show();
                  $('#numero').val("");
                });
                
                // Faz uma nova busca por armarios disponiveis depois que cadastramos um novo armario
                $.ajax({
                  url:"<?php echo base_url() ?>coordenacao/armario/busca_armarios_disponiveis_ajax",
                  method:"POST",
                  dataType: 'json',
                  success:function(data){
                    $('#armario_id').empty();
                    for (var i = 0; i <= data.length; i++) {
                      $('#armario_id').prepend("<option value="+data[i].id+" >"+data[i].numero+"</option>");
                         //console.log(data.numero);
                      }      
                    }
                });          
              }
                
        }
      })
    })


    // Validacao do formulario de aluguel de armario
    $('#form_alugar').submit(function(){
      
      if (($('#armario_id').val() == null)){
        alert('Informe o número do armário');
        return false;
      }

      if ($('#data_inicio').val() == ""){
        alert('Informe a data do início da locação');
        return false;
      }

      if ($('#data_fim').val() == ""){
        alert('Informe a data de entrega do armário');
        return false;
      }

      if ($('#data_fim').val() < $('#data_inicio').val()) {
        alert('A data de entrega não pode terminar antes do início');
      }
      
    })

    // Abre modal
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

</script>