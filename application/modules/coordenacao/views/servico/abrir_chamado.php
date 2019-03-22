<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">

<style type="text/css">
	contentor
{
    width: 100px;
    overflow: hidden;
}

contentor > div
{
    width: 50%;
    float: left;
    box-sizing: border-box;
}
</style>





<div style="text-align: center; width: 500px; float: left; margin-left: 200px;">


	
	<div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <form class="form-purple" method="post" id="submit_formulario">
                    <div class="ibox-head" >
                        <div class="ibox-title" style="margin-left: 180px;">Abrir Chamado</div>
                    </div>
                    <div id="body">

                    	<div id="alert"></div>

                    	<div class="contentor" style="width: 100%;" id="adicionar">
						    <div class="div1" style="width: 20%; float: left;"><span class="input-icon input-icon-left">Código</span></div>
						    <div class="div2" style="width: 80%; float: left;"><input class="form-control" type="text" id="codigo" name="codigo" style="width: 215px; margin-left: -100px">
						           	<button type="button" id="adicionar_equipamento" class="btn btn-primary btn-icon-only btn-square btn-lg btn-air" style="height: 28px; margin-bottom: 10px; width: 30px;">+</button></div>
						</div>


						<div class="contentor" style="width: 100%" id="equipamento"></div>
						<div class="contentor" style="width: 100%" id="num_serie"></div>
						<div class="contentor" style="width: 100%" id="local"></div>
               			<div class="contentor" style="width: 100%" id="defeito"></div>



						<!--
                    	<div class="row">
                    		<div class="col-md-6">
                    			
                    			<div class="form-group" id="codigo_adicionar">
	                    			<span class="input-icon input-icon-left">Código</span>
						           	<input class="form-control" type="text" id="codigo" name="codigo" style="width: 212px;">
						           	<button type="button" id="adicionar_equipamento" class="btn btn-primary btn-icon-only btn-square btn-lg btn-air" style="height: 28px; margin-bottom: 10px; width: 30px; margin-left: 5px;">+</button>
						        </div>

       			        		<div id="codigo" style="margin-bottom: 20px; margin-left: 30px;"></div>
				        		<div id="equipamento" style="margin-bottom: 20px; margin-left: 30px;"></div>
				        		<div id="num_serie" style="margin-bottom: 20px; margin-left: 30px;"></div>
				        		<div id="local" style="margin-bottom: 20px; margin-left: 30px;"></div>
				        		<div id="defeito" style="margin-bottom: 20px; margin-left: 30px;"></div>

                    		</div>
                    		<div class="col-md-6">
                    			23323
                    		</div>
                    	</div>

						-->

                    	<!--
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

			        	<!--
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

						-->


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
        		$('#defeito').empty();
        		$('#codigo_adicionar').empty();

        		$('#adicionar').html('<div class="div1" style="width: 20%; float: left;"><span class="input-icon input-icon-left">Código</span></div><div class="div2" style="width: 80%; float: left;"><input class="form-control" type="text" id="codigo" name="codigo" style="width: 250px; margin-left: -100px"></div>');

        		$('#equipamento').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Equipamento</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="equipamento" style="width: 250px; margin-right:100px;"></div></div>');
        		
        		$('#num_serie').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Nº de Série</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="num_serie" style="width: 250px; margin-right:100px;"></div></div>');
        		
        		$('#local').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Local</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="local" style="width: 250px; margin-right:100px;"></div></div>');
        		
        		$('#defeito').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Defeito</span></div><div style="width: 80%; float: left;"><div class="form-group"><textarea id="defeito" name="defeito" rows="3" style="width: 250px; margin-right: 100px;"></textarea></div></div>');

        		//$('#codigo').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Codigo</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="codigo" name="codigo" style="width: 250px;"></td></div></div></td>');

        		//$('#codigo').html('<div class="form-group" id="codigo_adicionar"><span class="input-icon input-icon-left" style="margin-right:20px; margin-bottom10px;">Código</span><input class="form-control" type="text" id="codigo" name="codigo" style="width: 250px; margin-right:20px;"></div>');

        		//$('#equipamento').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Equipamento</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="equipamento" name="equipamento" style="width: 250px;"></td></div></div></td>');

        		//$('#equipamento').html('<div class="form-group" id="codigo_adicionar"><span class="input-icon input-icon-left" style="margin-right:20px; margin-bottom10px;">Equipamento</span><input class="form-control" type="text" id="equipamento" name="equipamento" style="width: 250px; margin-right:20px;"></div>');


        		//$('#num_serie').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Nº de Série</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="num_serie" name="num_serie" style="width: 250px;"></td></div></div></td>');

        		//$('#num_serie').html('<div class="form-group" id="codigo_adicionar"><span class="input-icon input-icon-left" style="margin-right:20px; margin-bottom10px;">Nº de Série</span><input class="form-control" type="text" id="num_serie" name="num_serie" style="width: 250px; margin-right:20px;"></div>');


        		//$('#local').html('<td style="width: 30%; text-align: right;"><div class="form-group" style="margin-bottom: 10px;"><div class="input-group"><span class="input-icon input-icon-left" style="margin-right: 15px;">Local</span><td style="width: 70%; text-align: left;"><input class="form-control" type="text" id="local" name="local" style="width: 250px;"></td></div></div></td>');

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
			            		//$('#adicionar').hide();
			            		$('#equipamento').empty();
			            		$('#num_serie').empty();
			            		$('#local').empty();

			            		//$('#equipamento').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Equipamento</span></div><div style="width: 80%; float: left;"><div class="form-group"><h5 class="font-strong mb-4">'+ data[0].nome +'</h5></div></div>');

			            		$('#adicionar').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Código</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="codigo" readonly="readonly" value="'+data[0].codigo+'" style="width: 250px; margin-right:100px;"></div></div>');

			            		$('#equipamento').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Equipamento</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="equipamento" readonly="readonly" value="'+data[0].nome+'" style="width: 250px; margin-right:100px;"></div></div>');
			            		
			            		$('#num_serie').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Nº de Série</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="num_serie" readonly="readonly" value="'+data[0].num_serie+'" style="width: 250px; margin-right:100px;"></div></div>');

			            		$('#local').html('<div style="width: 20%; float: left;"><span class="input-icon input-icon-left" style="margin-right:10px; margin-top:30px;">Local</span></div><div style="width: 80%; float: left;"><div class="form-group"><input class="form-control" type="text" name="local" readonly="readonly" value="'+data[0].local+'" style="width: 250px; margin-right:100px;"></div></div>');

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
		        var local = $('input[name=local]').val();
		        var defeito = $('textarea#defeito').val();
		        //alert('hj');
		        $.ajax({
		            url:"<?php echo base_url() ?>coordenacao/servico/abrir_chamado_submit",
		            method:"POST",
		            dataType: 'json',
		            data:{codigo:codigo, equipamento:equipamento, num_serie:num_serie, local:local, defeito:defeito},
		            success:function(data){
		                    //alert('CERTO');
		                console.log(data);
		                alert(data);
		                alert(data[0].codigo);

		                
		                $('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Cadastrado com sucesso!!</h4></div>');
		                

		                if (data == 1) {
		                	$('#alert').html('<div class="alert alert-danger alert-dismissable"><h4 class="text-white">Já existe um chamado em aberto com este código!</h4></div>');
		                	console.log(data);
		                }
		            }  
		        })         
		    })



			//alert('fdfdf');	
		})
		

		//codigo:codigo, equipamento:equipamento, num_serie:num_serie, local:local, defeito:defeito
	</script>