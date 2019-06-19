<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">

<div style="text-align: center; width: 500px; float: left; margin-left: 200px;">
	<div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <form class="form-purple" method="post" id="submit_formulario">
                    <div class="ibox-head" >
                        <div class="ibox-title" style="margin-left: 180px;">Abrir Chamado</div>
                    </div>
                    
                   	<div id="alert"></div>

                	<div class="contentor" style="width: 100%;" id="adicionar">
					    <div class="div1" style="width: 20%; float: left;"><span class="input-icon input-icon-left">Código</span></div>
					    <div class="div2" style="width: 80%; float: left;"><input class="form-control" type="text" id="codigo" name="codigo" style="width: 215px; margin-left: -100px">
					           	<button type="button" id="adicionar_equipamento" class="btn btn-primary btn-icon-only btn-square btn-lg btn-air" style="height: 28px; margin-bottom: 10px; width: 30px;">+</button></div>
					</div>

					<div class="contentor" style="width: 100%" id="codigo_input"></div>
					<div class="contentor" style="width: 100%" id="equipamento"></div>
					<div class="contentor" style="width: 100%" id="num_serie"></div>
					<div class="contentor" style="width: 100%" id="local"></div>
					<div class="contentor" style="width: 100%" id="adicionar_local"></div>
           			<div class="contentor" style="width: 100%" id="defeito"></div>

                    
                    <div class="ibox-footer">
                        <button type="submit" class="btn btn-primary mr-2">Abrir</button>
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>servico/suporte" type="reset">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>






<!--  Modal que edita o chamado -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center">
        <h3 class="modal-title" id="exampleModalLabel">Adicionar Local</h3>
      </div>
      <div class="modal-body" id="modal_body">
        <form method="post" id="formulario_adicionar_local">

            <table style="width: 100%">
                <tr style="margin-bottom: 20px;">
                    <td style="width: 30%; text-align: center;">
                        <div class="form-group" style="margin-bottom: 10px">
                            <div class="input-group">
                                <span class="input-icon input-icon-left" style="font-size: 15px;">Informe o local</span>
                                <td style="width: 70%; text-align: left;">
                                    <input class="form-control" name="local" type="text" id="add_local" style="width: 250px">
                                </td>
                            </div>
                        </div>
                    </td>
                </tr>
             
            </table>       
        
      </div>
              <div class="modal-footer" style="text-align: center;">
                <button type="button" id="fecha_modal" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-primary">Adicionar</button>
              </div>
        </form>      
    </div>
  </div>
</div>

		<!-- Carrega Ajax -->    
<script src="<?php echo base_url();  ?>public/temas/admin/scripts/ajax.min.js"></script>
<script type="text/javascript">
		
	$(document).ready(function(){
		//$('#detalhes_equipamento').hide();

		//$('#body').html('Cadastro realizado com sucesso');
		//$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Já existe um chamado em aberto com este código!</h4></div>');

		$('#adicionar_equipamento').click(function(){
			
			$('#equipamento').empty();
    		$('#num_serie').empty();
    		$('#local').empty();
    		$('#defeito').empty();
    		$('#codigo_adicionar').empty();
    		$('#codigo_input').empty();
    		$('#alert').empty();

    		$('#adicionar').html('<div class="div1" style="width: 20%; float: left;"><span class="input-icon input-icon-left">Código</span></div><div class="div2" style="width: 80%; float: left;"><input class="form-control" type="text" id="codigo" name="codigo" style="width: 250px; margin-left: -100px"></div>');

    		$('#equipamento').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Equipamento</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="equipamento" style="width: 250px; margin-right:100px;"></div></div>');
    		
    		$('#num_serie').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Nº de Série</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="num_serie" style="width: 250px; margin-right:100px;"></div></div>');
    		
    		$('#local').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Local</span></div><div style="width: 80%; float: left;"><div class="form-group"><select class="form-control" name="local" id="local_option" style="width: 220px; margin-right:10px; margin-left: -75px"></select><button type="button" id="adicionar_equipamento" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-primary btn-icon-only btn-square btn-lg btn-air" style="height: 28px; margin-bottom: 10px; width: 30px; margin-right:30px">+</button></div></div>');
    		
    		$('#defeito').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Defeito</span></div><div style="width: 80%; float: left;"><div class="form-group"><textarea id="defeito" name="defeito" rows="3" style="width: 250px; margin-right: 100px;"></textarea></div></div>');

    		$.ajax({
	            url:"<?php echo base_url() ?>servico/suporte/busca_local",
	            method:"POST",
	            dataType: 'json',
	            //data:{codigo:codigo, equipamento:equipamento, num_serie:num_serie, local:local, defeito:defeito},
	            success:function(data){
	            	//console.log(data);
	            	for (var i = 0; i < data.length; i++) {
	            		$('#local_option').append('<option value='+data[i].id+'>'+data[i].descricao+'</option>');
	            	}
	                
	            }  
	        })
		})

		$('#codigo').keyup(function(){
			
			if ($('#codigo').val().length > 1) {
				
				var codigo = $('#codigo').val(); //alert('e');
				$('#codigo_input').empty();
				$('#equipamento').empty();
        		$('#num_serie').empty();
        		$('#local').empty();
        		$('#defeito').empty();
				$.ajax({
		            url:"<?php echo base_url() ?>servico/suporte/busca_detalhes_abrir_chamado",
		            method:"POST",
		            dataType: 'json',
		            data:{codigo:codigo},
		            success:function(data){
		            	//alert('Deu Certooooo');
		            	if (data[0]) {
		            		//$('#adicionar').hide();

		            		$('#codigo_input').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Código</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="codigo" readonly="readonly" value="'+data[0].codigo+'" style="width: 250px; margin-right:100px;"></div></div>');

		            		$('#equipamento').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Equipamento</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="equipamento" readonly="readonly" value="'+data[0].nome+'" style="width: 250px; margin-right:100px;"></div></div>');
		            		
		            		$('#num_serie').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Nº de Série</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="num_serie" readonly="readonly" value="'+data[0].num_serie+'" style="width: 250px; margin-right:100px;"></div></div>');

		            		$('#local').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Local</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="local" readonly="readonly" value="'+data[0].descricao+'" style="width: 250px; margin-right:100px;"></div></div>');

		            		$('#defeito').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Defeito</span></div><div style="width: 80%; float: left;"><div class="form-group"><textarea id="defeito" rows="5" name="local" style="width: 250px; margin-right:100px;"></textarea></div></div>');

		            	}else{

		            		$('#equipamento').empty();
		            		$('#num_serie').empty();
		            		$('#local').empty();
		            		//alert('NAO RETORNOU NADA')
		            	}
		                //console.log(data);
		            }
	       		})
			}
			//var teste = $('#codigo').val();
			//alert(teste);
		})

		


		$('#submit_formulario').submit(function(e){
			e.preventDefault();
	        var codigo = $('input[name=codigo]').val();
	        var equipamento = $('input[name=equipamento]').val();
	        var num_serie = $('input[name=num_serie]').val();
	        var local_id = $("#local_option").val();
	        var defeito = $('textarea#defeito').val();
	        //alert(local);
	        //return false;
	        if (equipamento == '') {
	        	$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Informe o equipamento</h4></div>');
	                	return;
	        }
	        if (local == '') {
	        	$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Informe o local</h4></div>');
	                	return;
	        }

	        if (defeito == '') {
	        	$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Informe o defeito do equipamento</h4></div>');
	                	return;
	        }

	        $.ajax({
	            url:"<?php echo base_url() ?>servico/suporte/abrir_chamado_submit",
	            method:"POST",
	            dataType: 'json',
	            data:{codigo:codigo, equipamento:equipamento, num_serie:num_serie, local_id:local_id, defeito:defeito},
	            success:function(data){

	                if (data == true) {
	                	window.location.href = "<?php echo base_url() ?>servico/suporte";
	                	return; 
	                }

	                if ((data[0].num_serie > 0)) {
	                	$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Já existe um chamado aberto com esse Nº de Série</h4></div>');
	                	return;
	                }else if (data[0].codigo > 0) {
	                	$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Já existe um chamado aberto com esse Código</h4></div>');
	                	return;
	                }                	                
	            }  
	        })         
	    })

	})

	// Evita o envio do formulario com ENTER
   	$(document).keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   	});
	
	// Ao clicar ENTER abre o formulario para Cadastrar novo chamado, á pedido do Candido
	$(document).keyup(function(e){
		e.preventDefault();
		var key = e.which || e.keyCode;
	  	if (key == 13) { 
	    	$('#adicionar_equipamento').trigger('click');
	  	}
	})

	// Pula o campo ao dar ENTER
	$(document).on('keyup', 'input', function(event) {
	  
	  if (event.which == 13) {
	    var generico = $(document).find('input:visible');
	    var indice = generico.index(event.target) + 1;
	    var seletor = $(generico[indice]).focus();

	    if (seletor.length == 0) {
	      event.target.focus();
	    }
	  }
	})

	$('#formulario_adicionar_local').submit(function(e){
		e.preventDefault();
        var local = $('#add_local').val();
        if (local == '') {
        	alert('Digite o local');
        	//$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Informe o local</h4></div>');
                	return;
        }

        $.ajax({
            url:"<?php echo base_url() ?>servico/suporte/adicionar_local",
            method:"POST",
            dataType: 'json',
            data:{local:local},
            success:function(data){

                if (data == true) {
                	$.ajax({
			            url:"<?php echo base_url() ?>servico/suporte/busca_local",
			            method:"POST",
			            dataType: 'json',
			            success:function(data){
			            	//$('#local_option').val() = null;
			            	
			            	$('#fecha_modal').trigger('click');
			            	for (var i = 0; i < data.length; i++) {
			            		$('#local_option').append('<option value='+data[i].id+'>'+data[i].descricao+'</option>');
			            	}	
			            }  
			        })
                	//window.location.href = "<?php echo base_url() ?>servico/suporte/abrir_chamado";
                	
                }    
        	}  
    	})         
	})

	// Gatilho para abrir modal
	$('#myModal').on('shown.bs.modal', function () {
	   $('#myInput').trigger('focus')
	})
		
</script>