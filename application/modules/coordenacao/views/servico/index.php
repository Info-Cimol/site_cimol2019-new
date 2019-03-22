
<!--  Modal que edita o chamado -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Editar Chamado</h3>
      </div>
      <div class="modal-body" id="modal_body">
        <form method="post" id="formulario_editar">

        	<table style="width: 100%">
        		
        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Atendimento</span>
				                <td style="width: 70%; text-align: left;" id="data_atendimento">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Solução</span>
				                <td style="width: 70%; text-align: left;" id="data_solucao">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Defeito</span>
				                <td style="width: 70%; text-align: left;" id="defeito">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Solução</span>
				                <td style="width: 70%; text-align: left;" id="solucao">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Status</span>
				                <td style="width: 70%; text-align: left;" id="status">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Nº de Série</span>
				                <td style="width: 70%; text-align: left;" id="num_serie">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>


        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Local</span>
				                <td style="width: 70%; text-align: left;" id="local">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<div id="id_equipamento"></div>
        		<div id="codigo"></div>

        		

        	</table>       
        
      </div>
		      <div class="modal-footer" style="text-align: center;">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
		        <button type="submit" class="btn btn-primary">Editar</button>
		      </div>
		</form>      
    </div>
  </div>
</div>


<!-- Modal que mostra os detalhes do chamado -->
<div class="modal fade" id="modal_detalhes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Detalhes</h3>
      </div>
      <div class="modal-body">
        <form>

        	<table style="width: 100%">
        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Código :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_codigo">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Equipamento :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_nome">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Nº Série :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_num_serie">

						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Abertura :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_data_abertura">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Atendimento :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_data_atendimento">

						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Solução :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_data_solucao">

						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Local :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_local">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Defeito :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_defeito">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Solução :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_solucao">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Status :</span>
				                <td style="width: 70%; text-align: left;" id="detalhes_status">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        	</table>       
        </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
      </div>
    </div>
  </div>
</div>


<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">


<div style=" float: left; width: 860px; margin-left: 40px; text-align: center;">

    <div class="page-wrapper">
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h3 class="font-strong mb-4">Ordem de Serviços</h3>
                        
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2" style="margin-right: 10px;">Filtrar:</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select"  data-width="150px">
                                    <option>Todos</option>
                                    <option>Pendente</option>
                                    <option>Aguardando orçamento</option>
                                    <option>Aguardando peça</option>
                                    <option>Finalizado</option>
                                </select>
                            </div>
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>coordenacao/servico/abrir_chamado"><span><i class="menu-icon icon-plus"></i> Abrir</span></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>coordenacao/servico/finalizar_chamado"><span><i class="menu-icon icon-signout"></i> Finalizar</span></a>
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>Código</th>
                                        <th>Equipamento</th>
                                        <th>Abertura</th>
                                        <th>Defeito</th>
                                        <th>Status</th>
                                        <th>Detalhes</th>
                                        <th>Editar</th>

                                    </tr>
                                </thead>
                                <tbody id="tabela">
                                	<?php 
                                		foreach ($chamados as $chamado) {
                                		?>
                                			<tr>
		                                        <td style="text-align: center"><?php echo $chamado->codigo ?></td>
		                                        <td>
		                                            <a href=""><?php echo $chamado->nome ?></a>
		                                        </td>

		                                        <td><?php echo date('d/m/Y', strtotime($chamado->data_abertura)) ?></td>
		                                        <td><?php echo $chamado->defeito ?></td>
		                                        <td><?php echo $chamado->status ?></td>
		                                        <td>
		                                        	<button onclick="busca_detalhes(<?php echo $chamado->codigo ?>)" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_detalhes" data-whatever="@mdo"><span><i class="menu-icon icon-inbox"></i> DETALHES</span></button>
		                                        </td>
		                                        <td style="text-align: center">
		                                        	<button onclick="editar(<?php echo $chamado->codigo ?>)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span><i class="menu-icon icon-pencil"></i> EDITAR</span></button>
		                                        </td>
		                                        
		                                    </tr>
                                		<?php
                                		}
                                	 ?>                                                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Carrega Ajax -->    
<script src="<?php echo base_url();  ?>public/temas/admin/scripts/ajax.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

		$('#type-filter').change(function(){
			var status = $('#type-filter').val();
			//alert(status);
			$.ajax({
	            url:"<?php echo base_url() ?>coordenacao/servico/busca_chamado_ajax",
	            method:"POST",
	            dataType: 'json',
	            data:{status:status},
	            success:function(data){
	            	//alert('Deu Certooooo');
	            	$('#tabela').empty(); 	
	               	for (var i = 0; i < data.length; i++) {
	               		$('#tabela').append('<tr><td style="text-align: center">'+ data[i].codigo +'</td><td><a href="">'+data[i].nome+'</a></td><td>'+data[i].data_abertura+'</td><td>'+data[i].defeito+'</td><td>'+data[i].status+'</td><td><button onclick="busca_detalhes('+data[i].codigo+')" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_detalhes" data-whatever="@mdo"><span><i class="menu-icon icon-inbox"></i> DETALHES</span></button></td><td style="text-align: center"><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span><i class="menu-icon icon-pencil"></i> EDITAR</span></a></td></tr>');
	               	}
	                //console.log(data);
	            }
       		})
		})
		//alert(codigo);


	})

	function busca_detalhes($codigo){
		var codigo = $codigo;
		//alert(codigo);
		$.ajax({
            url:"<?php echo base_url() ?>coordenacao/servico/busca_detalhes",
            method:"POST",
            dataType: 'json',
            data:{codigo:codigo},
            success:function(data){
            	//alert(data[0].defeito);

            	$('#detalhes_status').empty();
            	$('#detalhes_solucao').empty();
            	$('#detalhes_defeito').empty();
            	$('#detalhes_codigo').empty();
            	$('#detalhes_nome').empty();
            	$('#detalhes_num_serie').empty();
            	$('#detalhes_data_abertura').empty();
            	$('#detalhes_data_atendimento').empty();
            	$('#detalhes_data_solucao').empty();
            	$('#detalhes_local').empty();

            	$('#detalhes_status').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].status +'</h5>');

            	if (data[0].solucao != null) {
                	$('#detalhes_solucao').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].solucao +'</h5>');	
                }

            	if (data[0].defeito != null) {
            		$('#detalhes_defeito').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+data[0].defeito+'</h5>');
            	}            	

            	if (data[0].codigo != null) {
            		$('#detalhes_codigo').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].codigo +'</h5>');	
            	} 	
                
                $('#detalhes_nome').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].nome +'</h5>');

                $('#detalhes_num_serie').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].num_serie +'</h5>');

                var d = new Date(data[0].data_abertura);
                data_abertura = (d.toLocaleDateString());
                $('#detalhes_data_abertura').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data_abertura +'</h5>');

                if (data[0].data_atendimento != null) {
                	$('#detalhes_data_atendimento').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].data_atendimento +'</h5>');	
                }

                if (data[0].data_solucao != null) {
                	$('#detalhes_data_solucao').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].data_solucao +'</h5>');	
                }

				if (data[0].local =! null) {
                	$('#detalhes_local').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].local +'</h5>');	
                }                
                //$('#local').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].local +'</h5>');

                //if (data[0].defeito != null) {
                		
                //}

                //$('#defeito').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].defeito +'</h5>');

                
                //$('#solucao').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].solucao +'</h5>');
                
                //$('#num_serie').html('UIUIUYGBNMK');
            }
       })
	}

	function editar($codigo){
		var codigo = $codigo;
		alert(codigo);
		//var defeito = $('#defeito').val();
		//alert(defeito);
		$.ajax({
	            url:"<?php echo base_url() ?>coordenacao/servico/busca_detalhes",
	            method:"POST",
	            dataType: 'json',
	            data:{codigo:codigo},
	            success:function(data){
	            	alert(data[0].status);
	            	console.log(data);
	            	//$('#defeito').html('<textarea name="defeito" style="width: 230px" row="2" >'+data[0].defeito+'</textarea>');

	            	$('#defeito').html('<textarea class="form-control" id="defeito" name="defeito" rows="2" style="width: 230px;">'+data[0].defeito+'</textarea>');

	            	//if (data[0].solucao =! null) {
	            	//	$('#solucao').html('<textarea class="form-control"  name="solucao" style="width: 230px" row="2" value='+data[0].defeito+'></textarea>');	
	            	//}else{
	            	//	$('#solucao').html('<textarea class="form-control"  name="solucao" style="width: 230px" row="2">lklk</textarea>');
	            	//}

	            	if (data[0].solucao == null) {
	            		$('#solucao').html('<textarea class="form-control" name="solucao" rows="2" style="width: 230px;"></textarea>');
	            	}else{
	            		$('#solucao').html('<textarea class="form-control" name="solucao" rows="2" style="width: 230px;">'+data[0].solucao+'</textarea>');
	            	}
	            	
	           		if (data[0].num_serie == null) {
	           			$('#num_serie').html('<input class="form-control" type="text" name="num_serie" style="width: 250px">');
	           		}else{
	           			$('#num_serie').html('<input class="form-control" type="text" value='+data[0].num_serie+' name="num_serie" style="width: 250px">');
	           		} 	
	            	
	            	
	            	$('#status').html('<select style="width: 265px" name="status"><option>'+data[0].status+'</option><option>Pendente</option><option>Aguardando peça</option><option>Aguardando orçamento</option><option>Finalizado</option></select>');
	            	
	            	if (data[0].data_atendimento == null) {
	            		$('#data_atendimento').html('<input class="form-control" type="date" name="data_atendimento" style="width: 250px">');
	            	}else{
	            		$('#data_atendimento').html('<input class="form-control" type="date" name="data_atendimento" style="width: 250px" value='+data[0].data_atendimento+'>');
	            	}

	            	if (data[0].data_solucao == null) {
	            		$('#data_solucao').html('<input class="form-control" type="date" name="data_solucao" style="width: 250px">');
	            	}else{
	            		$('#data_solucao').html('<input class="form-control" value='+data[0].data_solucao+' type="date" name="data_solucao" style="width: 250px">');
	            	}

	            	
	            	
	            	if (data[0].local != null) {
	            		$('#local').html('<input class="form-control" type="text" value='+data[0].local+' name="local" style="width: 250px">');
	            	}else{
	            		$('#local').html('<input class="form-control" type="text" name="local" style="width: 250px">');
	            	}
	            		         		

	            	$('#id_equipamento').html('<input type="hidden" name="id_equipamento" value="9">');

	            	$('#codigo').html('<input type="hidden" name="codigo" value='+data[0].codigo+' >');

	            }
       		})

	}

	$('#formulario_editar').submit(function(e){
		e.preventDefault();
		var data_atendimento = $('input[name=data_atendimento]').val();
		var data_solucao = $('input[name=data_solucao]').val();
		var defeito = $('textarea[name=defeito]').val();
		var solucao = $('textarea[name=solucao]').val();
		var status = $('select[name=status]').val();
		var num_serie = $('input[name=num_serie]').val();
		var local = $('input[name=local]').val();
		var id_equipamento = $('input[name=id_equipamento]').val();
		var codigo = $('input[name=codigo]').val();

		//alert($('input[name=local]').val());
		$.ajax({
            url:"<?php echo base_url() ?>coordenacao/servico/editar_chamado",
            method:"POST",
            dataType: 'json',
            data:{codigo:codigo, data_atendimento:data_atendimento, data_solucao:data_solucao, defeito:defeito, solucao:solucao, status:status, num_serie:num_serie, local:local},
            success:function(data){
            	//alert('CERTO');
            	$('#modal_body').html('<div class="text-align:center;"><h3 style="text-align:center">Alterado com sucesso!</h3><br><br><a type="button" href="<?php echo base_url() ?>coordenacao/servico/index" class="btn btn-primary">Sair</a></div>');
            }
       })
	})


</script>


<!-- Trigger que abre os Modal -->
<script type="text/javascript">
	
	$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus')
	})	

</script>


