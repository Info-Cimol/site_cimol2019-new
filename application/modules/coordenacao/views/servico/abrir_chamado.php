<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">

<div style="text-align: center; width: 500px; float: left; margin-left: 200px;">
	
	<div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <form class="form-purple" method="post" id="submit_formulario">
                    <div class="ibox-head" >
                        <div class="ibox-title" style="margin-left: 180px;">Abrir Chamado</div>
                    </div>
                    <div class="ibox-body" id="body">

                    	<div id="alert">
                    		
                    	</div>

                    	

                    	<table>

			           		<tr style="margin-bottom: 40px;" id="codigo_adicionar">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Código</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" id="codigo" name="codigo" style="width: 212px;">
							                	<button type="button" id="adicionar_equipamento" class="btn btn-primary btn-icon-only btn-square btn-lg btn-air" style="height: 28px; margin-bottom: 10px; width: 30px; margin-left: 5px;">+</button>
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr id="codigo" style="margin-bottom: 20px;"></tr>
			        		<tr id="equipamento" style="margin-bottom: 20px;"></tr>
			        		<tr id="num_serie" style="margin-bottom: 20px;"></tr>
			        		<tr id="local" style="margin-bottom: 20px;"></tr>


			        		
							    

			        		<!--
			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Equipamento</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="nome" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Nº de Série</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="num_serie" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Local</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="local" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        	-->
			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Defeito</span>
							                <td style="width: 70%; text-align: left;">
							                	<textarea class="form-control" type="text" name="defeito" rows="2" style="width: 230px;"></textarea>
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>
                    	
                    	</table>



                    </div>
                    <div class="ibox-footer">
                        <button type="submit" class="btn btn-primary mr-2">Abrir</button>
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>coordenacao/servico" type="reset">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


<!--
<form action="<?php echo base_url() ?>coordenacao/servico/abrir_chamado_submit" method="post">
		<label>codigo</label>
		<input type="text" name="codigo">
		<label>N serie</label>
		<input type="text" name="num_serie">
		<label>Nome</label>
		<input type="text" name="nome">
		<label>descricao</label>
		<input type="text" name="descricao">

		<h4>Chamado</h4>


		<label>Defeito</label>
		<input type="text" name="defeito">

		<input type="submit" name="abrir_chamado" value="abrir_chamado">

	</form>

	-->


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
        		$('#codigo_adicionar').empty();

        		$('#codigo').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Codigo</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="codigo" name="codigo" style="width: 250px;"></td></div></div></td>');
        		$('#equipamento').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Equipamento</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="equipamento" name="equipamento" style="width: 250px;"></td></div></div></td>');
        		$('#num_serie').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Nº de Série</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="num_serie" name="num_serie" style="width: 250px;"></td></div></div></td>');
        		$('#local').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Local</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="local" name="local" style="width: 250px;"></td></div></div></td>');

			})

			$('#codigo').keyup(function(){
				
				if ($('#codigo').val().length > 1) {
					
					var codigo = $('#codigo').val(); //alert('e');
					$.ajax({
			            url:"<?php echo base_url() ?>coordenacao/servico/busca_detalhes",
			            method:"POST",
			            dataType: 'json',
			            data:{codigo:codigo},
			            success:function(data){
			            	//alert('Deu Certooooo');
			            	if (data[0]) {
			            		//$('#equipamento').show();
			            		$('#equipamento').empty();
			            		$('#num_serie').empty();
			            		$('#local').empty();

			            		$('#equipamento').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Equipamento:</span><td style="width: 70%; text-align: left;"><h5 class="font-strong mb-4">'+ data[0].nome +'</h5></td></div></div></td>');
			            		
			            		$('#num_serie').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Nº de Série:</span><td style="width: 70%; text-align: left;"><h5 class="font-strong mb-4">'+ data[0].num_serie +'</h5></td></div></div></td>');

			            		$('#local').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Local:</span><td style="width: 70%; text-align: left;"><h5 class="font-strong mb-4">'+ data[0].local +'</h5></td></div></div></td>');

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
		        var codigo = $('#codigo').val();
		        var equipamento = $('#equipamento').val();
		        var num_serie = $('#num_serie').val();
		        var local = $('#local').val();
		        var defeito = $('#defeito').val();
		        //alert('SUBMIT');
		        $.ajax({
		            url:"<?php echo base_url() ?>coordenacao/servico/abrir_chamado_submit",
		            method:"POST",
		            dataType: 'json',
		            data:{codigo:codigo, equipamento:equipamento, num_serie:num_serie, local:local, defeito:defeito},
		            success:function(data){
		                    alert('CERTO');
		                  console.log(data);
		            },
		            error:function(data){
		            	alert('ERRO');
		            }  
		        })         
		    })



			//alert('fdfdf');	
		})
		

		//codigo:codigo, equipamento:equipamento, num_serie:num_serie, local:local, defeito:defeito
	</script>